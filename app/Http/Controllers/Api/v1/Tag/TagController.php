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
     * Edit a tag
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Int $id) // TODO add form request for editting a tag
    {
        return response()->json($this->tag_repository->edit($request, $id));
    }

    /**
     * Delete a tag
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Int $id)
    {
        return response()->json($this->tag_repository->delete($id));
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
