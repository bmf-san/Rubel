<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CategoryRepository;

use App\Http\Requests\Api\v1\Category\CreateCategoryRequest;

class CategoryController extends Controller
{
    private $category_repository;

    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    /**
     * Create a new category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCategoryRequest $request) // TODO add form request for creating a category
    {
        return response()->json($this->category_repository->create($request));
    }

    /**
     * Edit a category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) // TODO add form request for editting a category
    {
        return response()->json($this->category_repository->edit($request, $id));
    }

    /**
     * Delete a category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return response()->json($this->category_repository->delete($id));
    }

    /**
     * Show categories
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        return response()->json($this->category_repository->getCategories());
    }
}
