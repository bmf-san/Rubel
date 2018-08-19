<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Http\Response;
use BmfTech\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Rubel\Repositories\Eloquent\TagRepository;

class SitemapController extends Controller
{
    /**
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * CategoryRepository
     *
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * TagRepository
     *
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * Static name routes
     *
     * @var array
     */
    private $staticNameRoutes = [
        'web.root.index',
        'web.posts.index',
        'web.tags.index',
        'web.categories.index',
        'web.profiles.index',
        'web.contacts.index',
    ];

    /**
     * WEB_POSTS_SHOW
     *
     * @var string
     */
    const WEB_POSTS_SHOW = 'web.posts.show';

    /**
     * WEB_POSTS_CATEGORIES_GETPOSTS
     *
     * @var string
     */
    const WEB_POSTS_CATEGORIES_GETPOSTS = 'web.posts.categories.getPosts';

    /**
     * WEB_POSTS_TAGS_GETPOSTS
     *
     * @var string
     */
    const WEB_POSTS_TAGS_GETPOSTS = 'web.posts.tags.getPosts';

    /**
     * SitemapController constructor
     *
     * @param PostRepository $postRepository
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $sitemap = $this->getSitemap();

        return response()->view('bmftech::sitemap.index', ['sitemap' => $sitemap])->header('Content-Type', 'application/xml');
    }

    /**
     * Get sitemap
     *
     * @return array
     */
    private function getSitemap(): array
    {
        $staticSitemap = $this->getStaticSitemap();
        $dynamicSitemap = $this->getDynamicSitemap();

        return array_merge($staticSitemap, $dynamicSitemap);
    }

    /**
     * Get static sitemap
     *
     * @return array
     */
    private function getStaticSitemap(): array
    {
        $staticSitemap = [];

        foreach ($this->staticNameRoutes as $routes) {
            $staticSitemap[] = (object) [
                'url' => route($routes),
                'updated_at' => $this->postRepository->findLatest()->updated_at->format('Y-m-d'),
            ];
        }

        return $staticSitemap;
    }

    /**
     * Get dynamic sitemap
     *
     * @return array
     */
    private function getDynamicSitemap(): array
    {
        $dynamicSitemap = [];

        foreach ($this->postRepository->findAll() as $post) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_SHOW, $post->title),
                'updated_at' => $post->updated_at->format('Y-m-d'),
            ];
        }

        foreach ($this->categoryRepository->findAll() as $category) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_CATEGORIES_GETPOSTS, $category->name),
                'updated_at' => $category->updated_at->format('Y-m-d'),
            ];
        }

        foreach ($this->tagRepository->findAll() as $tag) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_TAGS_GETPOSTS, $tag->name),
                'updated_at' => $tag->updated_at->format('Y-m-d'),
            ];
        }

        return $dynamicSitemap;
    }
}
