<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Repositories\Eloquent\PostRepository;
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
     * Category
     *
     * @var Category
     */
    private $categoryModel;

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
     * @param Category $categoryModel
     * @param Tag      $tagModel
     */
    public function __construct(PostRepository $postRepository, Category $categoryModel, Tag $tagModel)
    {
        $this->postRepository = $postRepository;
        $this->categoryModel = $categoryModel;
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
        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('bmftech::home.index', ['recentPosts' => $recentPosts, 'randomPosts' => $randomPosts, 'categories' => $categories, 'tags' => $tags]);
    }
}
