<?php

namespace App\Http\Controllers\Web;

use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * Post
     *
     * @var Post
     */
    private $postModel;

    /**
     * Category
     *
     * @var Category
     */
    private $categoryModel;

    /**
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * PostController constructor
     *
     * @param Post     $postModel
     * @param Category $categoryModel
     * @param Tag      $tagModel
     */
    public function __construct(Post $postModel, Category $categoryModel, Tag $tagModel)
    {
        $this->postModel = $postModel;
        $this->categoryModel = $categoryModel;
        $this->tagModel = $tagModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $id
     * @return View
     */
    public function index(): View
    {
        $posts = $this->postModel->where('publication_status', 'public')->orderBy('created_at', 'desc')->paginate(self::PAGINATION_LIMIT);

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.index', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        $post = $post->where('publication_status', 'public')->findOrFail($post->id);

        $previousPost = $post->where('id', '<', $post->id)->where('publication_status', 'public')->orderBy('id', 'desc')->first();
        $nextPost = $post->where('id', '>', $post->id)->where('publication_status', 'public')->first();

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.show', ['post' => $post, 'previousPost' => $previousPost, 'nextPost' => $nextPost, 'categories' => $categories, 'tags' => $tags]);
    }
}
