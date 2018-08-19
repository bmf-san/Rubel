<?php

namespace BmfTech\Http\Controllers\Web;

use \Illuminate\Contracts\View\View;
use BmfTech\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Rubel\Repositories\Eloquent\TagRepository;
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
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * CategoryRepository
     *
     * @var
     */
    private $categoryRepository;

    /**
     * TagRepository
     *
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * PostController constructor
     *
     * @param PostRepository     $postRepository
     * @param CategoryRepository $categoryRepository
     * @param TagRepository      $tagRepository
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $id
     * @return View
     */
    public function index(): View
    {
        $posts = $this->postRepository->findPublished(self::PAGINATION_LIMIT);

        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();

        return view('bmftech::post.index', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $title
     * @return View
     */
    public function show(string $title): View
    {
        $post = $this->postRepository->findByTitle($title);
        $postId = $post->id;
        $relatedPost = $this->postRepository->findRelatedPost($post, self::RELATED_POST_LIMIT);
        $previousPost = $this->postRepository->findPreviousPost($postId);
        $nextPost = $this->postRepository->findNextPost($postId);

        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();

        return view('bmftech::post.show', ['post' => $post, 'relatedPost' => $relatedPost, 'previousPost' => $previousPost, 'nextPost' => $nextPost, 'categories' => $categories, 'tags' => $tags]);
    }
}
