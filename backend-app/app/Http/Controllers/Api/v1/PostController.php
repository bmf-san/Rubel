<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\PostRepository;
use App\Http\Requests\Api\v1\Post\StorePostRequest;
use App\Http\Requests\Api\v1\Post\UpdatePostRequest;

class PostController extends Controller
{
    const STATUS_CODE_OK = 200;

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
        return response()->json($this->post_repository->index(), (int) self::STATUS_CODE_OK);
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
        return response()->json($this->post_repository->store($request), (int) self::STATUS_CODE_OK);
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
        return response()->json($this->post_repository->show($id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        return response()->json($this->post_repository->update($request, $id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return response()->json($this->post_repository->destroy($id), (int) self::STATUS_CODE_OK);
    }
}
