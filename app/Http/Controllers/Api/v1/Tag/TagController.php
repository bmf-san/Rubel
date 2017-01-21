<?php

namespace App\Http\Controllers\Api\v1\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\TagRepository;

class TagController extends Controller
{
    private $tag_repository;

    public function __construct(TagRepository $tag_repository)
    {
        $this->tag_repository = $tag_repository;
    }

    /**
     * Create a new tag
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) // TODO add form request for creating a tag
    {
        return response()->json($this->tag_repository())->create($request);
    }

    /**
     * Edit a tag
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // TODO add form request for editting a tag
    {
        return response()->json($this->tag_repository())->edit($id);
    }

    /**
     * Delete a tag
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return response()->json($this->tag_repository())->delete($id);
    }

    /**
     * Show tags
     *
     * @return \Illuminate\Http\Response
     */
    public function getTags()
    {
        return response()->json($this->tag_repository->getTags());
    }
}
