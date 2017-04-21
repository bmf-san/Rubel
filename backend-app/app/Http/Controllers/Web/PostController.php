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
        $post = $this->post_model->where('publication_status', 'public')->findOrFail($id);

        $previous_post = $this->post_model->where('id', '<', $id)->where('publication_status', 'public')->orderBy('id', 'desc')->first();
        $next_post = $this->post_model->where('id', '>', $id)->where('publication_status', 'public')->first();

        return view('post.show', ['post' => $post, 'previous_post' => $previous_post, 'next_post' => $next_post]);
    }
}
