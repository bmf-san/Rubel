<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\TagRepository;
use Rubel\Http\Requests\Api\v1\Tag\StoreTagRequest;

class TagController extends Controller
{
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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->tagRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreTagRequest $request): JsonResponse
    {
        return response()->json(['id' => $this->tagRepository->store($request->all())->id], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->tagRepository->findById($id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->tagRepository->updateById($request->all(), $id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->tagRepository->destroyById($id);

        return response()->json([], Response::HTTP_OK);
    }
}
