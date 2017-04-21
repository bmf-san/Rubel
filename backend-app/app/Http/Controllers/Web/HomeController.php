<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    private $post_model;

    public function __construct(Post $post_model)
    {
        $this->post_model = $post_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent_posts = $this->post_model->where('publication_status', 'public')->take(10)->get();
        $popular_posts = $this->post_model->where('publication_status', 'public')->take(10)->orderBy('views', 'desc')->get();

        return view('home.index', ['recent_posts' => $recent_posts, 'popular_posts' => $popular_posts]);
    }
}
