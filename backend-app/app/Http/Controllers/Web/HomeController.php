<?php

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

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
     * @return \Illuminate\Contracts\View\View
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
