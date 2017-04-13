<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CategoryRepository;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;

class CategoryController extends Controller
{
    const STATUS_CODE_OK = 200;

    private $category_repository;

    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->category_repository->index(), (int) self::STATUS_CODE_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        return response()->json($this->category_repository->store($request), (int) self::STATUS_CODE_OK);
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
        return response()->json($this->category_repository->show($id), (int) self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param [type] $request [description]
     * @param int    $id      [description]
     *
     * @return [type] [description]
     */
    public function update(Request $request, int $id)
    {
        return response()->json($this->category_repository->update($request, $id), (int) self::STATUS_CODE_OK);
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
        return response()->json($this->category_repository->destroy($id), (int) self::STATUS_CODE_OK);
    }
}
