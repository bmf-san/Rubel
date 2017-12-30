<?php

namespace Rubel\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Http\Controllers\Controller;
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
     * Post
     *
     * @var Post
     */
    private $postModel;

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
     * @param Post     $postModel
     * @param Category $categoryModel
     * @param Tag      $tagModel
     */
    public function __construct(Post $postModel, Category $categoryModel, Tag $tagModel)
    {
        $this->postModel = $postModel;
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
        $recentPosts = $this->postModel->where('publication_status', 'public')->take(self::PAGINATION_LIMIT)->orderBy('created_at', 'desc')->get();
        $randomPosts = $this->postModel->where('publication_status', 'public')->inRandomOrder()->take(self::PAGINATION_LIMIT)->orderBy('created_at', 'desc')->get();

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('home.index', ['recentPosts' => $recentPosts, 'randomPosts' => $randomPosts, 'categories' => $categories, 'tags' => $tags]);
    }
}
