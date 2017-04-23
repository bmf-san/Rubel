<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;

class TagController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $tag_model;
    private $category_model;

    public function __construct(Tag $tag_model, Category $category_model)
    {
        $this->tag_model = $tag_model;
        $this->category_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $tags = $this->tag_model->all();

        return view('tag.index', ['tags' => $tags]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function getPosts(int $id)
    {
        $posts = $this->tag_model->find($id)->posts()->where('publication_status', 'public')->paginate(self::POST_PAGINATE_NUM);

        $categories = $this->category_model->all();
        $tags = $this->tag_model->all();

        return view('post.tag', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
