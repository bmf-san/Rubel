<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Rubel\Http\Requests\Api\v1\Category\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * CategoryRepository
     *
     * @var $categoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryRepository constructor
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->categoryRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return response()->json(['id' => $this->categoryRepository->store($request->all())->id], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->categoryRepository->findById($id), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->categoryRepository->updateById($request->all(), $id), Response::HTTP_OK);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->categoryRepository->destroyById($id);

        return response()->json([], Response::HTTP_OK);
    }
}
