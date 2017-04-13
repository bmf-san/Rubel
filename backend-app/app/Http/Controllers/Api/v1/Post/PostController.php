<?php

namespace App\Http\Controllers\Api\v1\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PostRepository;
use App\Http\Requests\Api\v1\Post\StorePostRequest;

class PostController extends Controller
{
    private $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->post_repository->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        return response()->json($this->post_repository->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        return response()->json($this->post_repository->show($id));
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        return response()->json($this->post_repository->update($request, $id));
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return response()->json($this->post_repository->destroy($id));
    }
}
