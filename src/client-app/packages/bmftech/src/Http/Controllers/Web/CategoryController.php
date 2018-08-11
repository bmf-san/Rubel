<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Rubel\Repositories\Eloquent\TagRepository;

class CategoryController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 20;

    /**
     * Post
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Category
     *
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * Tag
     *
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * CategoryController constructor
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
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryRepository->findAll();

        return view('bmftech::category.index', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  stirng $categoryName
     * @return View
     */
    public function getPosts(string $categoryName): View
    {
        $posts = $this->postRepository->findByCategoryName($categoryName, self::PAGINATION_LIMIT);

        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();

        return view('bmftech::post.category', ['categoryName' => $categoryName, 'posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
