<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    private $post_model;
    private $category_model;
    private $tag_model;

    public function __construct(Post $post_model, Category $category_model, Tag $tag_model)
    {
        $this->post_model = $post_model;
        $this->category_model = $category_model;
        $this->tag_model = $tag_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $recent_posts = $this->post_model->where('publication_status', 'public')->take(10)->get();
        $popular_posts = $this->post_model->where('publication_status', 'public')->take(10)->orderBy('views', 'desc')->get();

        $categories = $this->category_model->all();
        $tags = $this->tag_model->all();

        return view('home.index', ['recent_posts' => $recent_posts, 'popular_posts' => $popular_posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
