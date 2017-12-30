<?php

namespace Rubel\Http\Controllers\Web;

use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Models\Post;
use Rubel\Models\Category;
use Rubel\Models\Tag;

class SitemapController extends Controller
{
    /**
     * Post
     *
     * @var Post
     */
    private $post;

    /**
     * Category
     *
     * @var Category
     */
    private $category;

    /**
     * Tag
     *
     * @var Tag
     */
    private $tag;

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
     * @param Post $post
     * @param Category $category
     * @param Tag $tag
     */
    public function __construct(Post $post, Category $category, Tag $tag)
    {
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $sitemap = $this->getSitemap();

        return response()->view('sitemap.index', ['sitemap' => $sitemap])->header('Content-Type', 'application/xml');
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
        foreach ($this->staticNameRoutes as $routes) {
            $staticSitemap[] = (object) [
                'url' => route($routes),
                'updated_at' => $this->post->latest()->first()->updated_at->format('Y-m-d'),
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
        foreach ($this->post->all() as $post) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_SHOW, $post->title),
                'updated_at' => $post->updated_at->format('Y-m-d'),
            ];
        }

        foreach ($this->category->all() as $category) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_CATEGORIES_GETPOSTS, $category->name),
                'updated_at' => $category->updated_at->format('Y-m-d'),
            ];
        }

        foreach ($this->tag->all() as $tag) {
            $dynamicSitemap[] = (object) [
                'url' => route(self::WEB_POSTS_TAGS_GETPOSTS, $tag->name),
                'updated_at' => $tag->updated_at->format('Y-m-d'),
            ];
        }

        return $dynamicSitemap;
    }
}
