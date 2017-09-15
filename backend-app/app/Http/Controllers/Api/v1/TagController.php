<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Api\TagRepository;
use App\Http\Requests\Api\v1\Tag\StoreTagRequest;

class TagController extends Controller
{
    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    /**
     * TagRepository
     *
     * @var $tagRepository
     */
    private $tagRepository;

    /**
     * TagRepository constructor
     *
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->tagRepository->index(), self::STATUS_CODE_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTagRequest $request): JsonResponse
    {
        return response()->json($this->tagRepository->store($request), self::STATUS_CODE_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->tagRepository->show($id), self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->tagRepository->update($request, $id), self::STATUS_CODE_OK);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->tagRepository->destroy($id), self::STATUS_CODE_OK);
    }
}
