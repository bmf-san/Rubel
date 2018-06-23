<?php

namespace Rubel\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Rubel\Http\Controllers\Controller;
use Rubel\Models\Tag;
use Rubel\Models\Category;

class TagController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 10;

    /**
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * Category
     *
     * @var Category
     */
    private $categoryModel;

    /**
     * TagController constructor
     *
     * @param Tag      $tagModel
     * @param Category $categoryModel
     */
    public function __construct(Tag $tagModel, Category $categoryModel)
    {
        $this->tagModel = $tagModel;
        $this->categoryModel = $categoryModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tags = $this->tagModel->all();

        return view('tag.index', ['tags' => $tags]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  Tag $tag
     * @return View
     */
    public function getPosts(Tag $tag): View
    {
        $posts = $tag->posts()->where('publication_status', 'public')->paginate(self::PAGINATION_LIMIT);

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.tag', ['tag' => $tag, 'posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
