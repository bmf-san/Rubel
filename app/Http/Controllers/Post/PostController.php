<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * Show a single post
	 *
	 * @param  string $id
	 * @return \Illuminate\Http\Response
	 */
    public function getPost($id)
    {
        return view('post.single');
    }

	/**
	* Show posts
	*
	* @param  string $id
	* @return \Illuminate\Http\Response
	*/
    public function getPosts()
    {
        return view('post.posts');
    }
}
