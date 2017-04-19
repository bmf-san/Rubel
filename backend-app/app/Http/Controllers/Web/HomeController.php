<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO　リポジトリーつくる？？
        // $recent_posts =
        // $category_posts =
        // return view('home.index', ['recent_post' => $recent_posts, 'popular_post' => $popular_posts];

        return view('home.index');
    }
}
