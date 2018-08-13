<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;
use BmfTech\Http\Controllers\Controller;
use Rubel\Models\Post;
use Rubel\Models\Category;
use Rubel\Models\Tag;

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
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * HomeController constructor
     *
     * @param PostRepository   $postRepository
     * @param CategoryRepository $categoryRepository
     * @param Tag      $tagModel
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, Tag $tagModel)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagModel = $tagModel;
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
        $tags = $this->tagModel->all();

        return view('bmftech::home.index', ['recentPosts' => $recentPosts, 'randomPosts' => $randomPosts, 'categories' => $categories, 'tags' => $tags]);
    }
}
