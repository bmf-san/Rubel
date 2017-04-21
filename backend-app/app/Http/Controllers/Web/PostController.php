<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->where('publication_status', 'public')->paginate(self::POST_PAGINATE_NUM);

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return view('post.show');
    }
}
