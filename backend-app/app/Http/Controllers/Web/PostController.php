<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $post_model;

    public function __construct(Post $post_model)
    {
        $this->post_model = $post_model;
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
        $posts = $this->post_model->where('publication_status', 'public')->paginate(self::POST_PAGINATE_NUM);

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
        $post = $this->post_model->findOrFail($id);

        return view('post.show', ['post' => $post]);
    }
}
