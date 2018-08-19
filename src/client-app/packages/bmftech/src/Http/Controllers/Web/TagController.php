<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use BmfTech\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\TagRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;

class TagController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * TagRepository
     *
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * CategoryRepository
     *
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * TagController constructor
     *
     * @param PostRepository $postRepository
     * @param TagRepository $tagRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PostRepository $postRepository, TagRepository $tagRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tags = $this->tagRepository->findAll();

        return view('bmftech::tag.index', ['tags' => $tags]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string $tagName
     * @return View
     */
    public function getPosts(string $tagName): View
    {
        $posts = $this->postRepository->findAllByTagName($tagName, self::PAGINATION_LIMIT);

        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();

        return view('bmftech::post.tag', ['tagName' => $tagName, 'posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
