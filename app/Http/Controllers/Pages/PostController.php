<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($id)
    {
        return view('pages.single');
    }

    public function getPosts()
    {
        return view('pages.posts');
    }
}
