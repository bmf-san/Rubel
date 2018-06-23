<?php

namespace Rubel\Http\Controllers\Web;

use \Illuminate\Contracts\View\View;
use Rubel\Http\Controllers\Controller;
use Rubel\Models\Post;
use Rubel\Models\Category;
use Rubel\Models\Tag;

class PostController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * Related post limit
     */
     const RELATED_POST_LIMIT = 5;
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
        $relatedPost = $this->postModel->where('posts.id', '!=', $post->id)
                                        ->whereHas('tags', function ($query) use ($post) {
                                            return $query->whereIn('tags.id', $post->tags()->pluck('tags.id')->toArray());
                                        })->take(self::RELATED_POST_LIMIT)->get();

        $previousPost = $post->where('id', '<', $post->id)->where('publication_status', 'public')->orderBy('id', 'desc')->first();
        $nextPost = $post->where('id', '>', $post->id)->where('publication_status', 'public')->first();

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.show', ['post' => $post, 'relatedPost' => $relatedPost, 'previousPost' => $previousPost, 'nextPost' => $nextPost, 'categories' => $categories, 'tags' => $tags]);
    }
}
