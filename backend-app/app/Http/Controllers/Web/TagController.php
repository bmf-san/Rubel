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
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function getPosts()
    {
    }

    public function getPost()
    {
    }
}
