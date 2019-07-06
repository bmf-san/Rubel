<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Rubel\Repositories\Eloquent\TagRepository;
use BmfTech\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

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
     * HomeController constructor
     *
     * @param PostRepository   $postRepository
     * @param CategoryRepository $categoryRepository
     * @param TagRepository      $tagRepository
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
     * @return View
     */
    public function index(): View
    {
        $recentPosts = $this->postRepository->findPublished(self::PAGINATION_LIMIT);
        $randomPosts = $this->postRepository->findByRandom(self::PAGINATION_LIMIT);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();

        return view(get_the_view_path('home.index'), ['recentPosts' => $recentPosts, 'randomPosts' => $randomPosts, 'categories' => $categories, 'tags' => $tags]);
    }
}
