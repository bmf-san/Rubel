<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    const POST_PAGINATE_NUM = 10;

    private $tag_model;

    public function __construct(Tag $tag_model)
    {
        $this->tag_model = $tag_model;
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
