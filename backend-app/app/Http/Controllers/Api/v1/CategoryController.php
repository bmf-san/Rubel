<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\Api\CategoryRepository;
use Rubel\Http\Requests\Api\v1\Category\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * CategoryRepository
     *
     * @var $CategoryRepository
     */
    private $CategoryRepository;

    /**
     * CategoryRepository constructor
     *
     * @param CategoryRepository $CategoryRepository
     */
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->CategoryRepository->index(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return response()->json($this->CategoryRepository->store($request), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->show($id), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->update($request, $id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->destroy($id), Response::HTTP_OK);
    }
}
