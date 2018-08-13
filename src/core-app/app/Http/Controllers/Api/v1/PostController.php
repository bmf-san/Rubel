<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Http\Requests\Api\v1\Post\StorePostRequest;
use Rubel\Http\Requests\Api\v1\Post\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Pagination limit
     *
     * @var int
     */
    const PAGINATION_LIMIT = 20;

    /**
     * PostRepository
     *
     * @var $postRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->postRepository->setWith('admin', 'category', 'comments', 'tags')->findAll(self::PAGINATION_LIMIT), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        return response()->json(['id' => $this->postRepository->store($request->all())->id], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(Int $id): JsonResponse
    {
        return response()->json($this->postRepository->setWith('admin', 'category', 'comments', 'tags')->findById($id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return JsonResponse
     */
    public function update(UpdatePostRequest $request, int $id): JsonResponse
    {
        return response()->json(['id' => $this->postRepository->updateById($request->all(), $id)->id], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->postRepository->destroyById($id);

        return response()->json([], Response::HTTP_OK);
    }
}
