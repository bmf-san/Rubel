<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $category_model;

    public function __construct(Category $category_model)
    {
        $this->tag_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function getPosts()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return view
     */
    public function getPost(int $id)
    {
    }
}
