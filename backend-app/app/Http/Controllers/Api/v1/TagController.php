<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\Api\TagRepository;
use App\Http\Requests\Api\v1\Tag\StoreTagRequest;

class TagController extends Controller
{
    const STATUS_CODE_OK = 200;

    private $tag_repository;

    public function __construct(TagRepository $tag_repository)
    {
        $this->tag_repository = $tag_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->tag_repository->index(), (int) self::STATUS_CODE_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        return response()->json($this->tag_repository->store($request), (int) self::STATUS_CODE_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json($this->tag_repository->show($id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        return response()->json($this->tag_repository->update($request, $id), (int) self::STATUS_CODE_OK);
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
        return response()->json($this->tag_repository->destroy($id), (int) self::STATUS_CODE_OK);
    }
}
