<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($id)
    {
        return view('post.single');
    }

    public function getPosts()
    {
        return view('post.posts');
    }
}
