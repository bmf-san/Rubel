<?php

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;

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
     * @return \Illuminate\Contracts\View\View;
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
     * @return \Illuminate\Contracts\View\View;
     */
    public function getPosts(Tag $tag): View
    {
        $posts = $tag->posts()->where('publication_status', 'public')->paginate(self::PAGINATION_LIMIT);

        $categories = $this->categoryModel->all();
        $tags = $this->tagModel->all();

        return view('post.tag', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
