<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    const POST_PAGINATE_NUM = 10;

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
     * @param string $id
     *
     * @return view
     */
    public function index()
    {
        $posts = $this->post_model->where('publication_status', 'public')->orderBy('created_at', 'desc')->paginate(self::POST_PAGINATE_NUM);

        $categories = $this->category_model->all();
        $tags = $this->tag_model->all();

        return view('post.index', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return view
     */
    public function show(int $id)
    {
        $post = $this->post_model->where('publication_status', 'public')->findOrFail($id);

        $previous_post = $this->post_model->where('id', '<', $id)->where('publication_status', 'public')->orderBy('id', 'desc')->first();
        $next_post = $this->post_model->where('id', '>', $id)->where('publication_status', 'public')->first();

        $categories = $this->category_model->all();
        $tags = $this->tag_model->all();

        return view('post.show', ['post' => $post, 'previous_post' => $previous_post, 'next_post' => $next_post, 'categories' => $categories, 'tags' => $tags]);
    }
}
