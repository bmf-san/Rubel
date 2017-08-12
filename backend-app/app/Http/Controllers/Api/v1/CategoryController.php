<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Api\CategoryRepository;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * STATUS_CODE_OK
     *
     * @var integer
     */
    const STATUS_CODE_OK = 200;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->CategoryRepository->index(), (int) self::STATUS_CODE_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return response()->json($this->CategoryRepository->store($request), (int) self::STATUS_CODE_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->show($id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->update($request, $id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->CategoryRepository->destroy($id), (int) self::STATUS_CODE_OK);
    }
}
