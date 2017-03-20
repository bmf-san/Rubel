<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CategoryRepository;
use App\Http\Requests\Api\v1\Category\CreateCategoryRequest;

class CategoryController extends Controller
{
    const OK_CODE = 200;

    private $category_repository;

    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    /**
     * Create a new category.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCategoryRequest $request)
    {
        return response()->json($this->category_repository->create($request), (int) self::OK_CODE);
    }

    /**
     * Edit a category.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id) // TODO add a form request for editting a category
    {
        return response()->json($this->category_repository->edit($request, $id), (int) self::OK_CODE);
    }

    /**
     * Delete a category.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        return response()->json($this->category_repository->delete($id), (int) self::OK_CODE);
    }

    /**
     * Show categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        return response()->json($this->category_repository->getCategories(), (int) self::OK_CODE);
    }
}
