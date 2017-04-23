<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CategoryController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $category_model;
    private $tag_model;

    public function __construct(Category $category_model, Tag $tag_model)
    {
        $this->category_model = $category_model;
        $this->tag_model = $tag_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $categories = $this->category_model->all();

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function getPosts(int $id)
    {
        $posts = $this->category_model->find($id)->posts()->where('publication_status', 'public')->paginate(self::POST_PAGINATE_NUM);

        $categories = $this->category_model->all();
        $tags = $this->tag_model->all();

        return view('post.category', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
