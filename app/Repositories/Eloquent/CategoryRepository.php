<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryContract
{
	public $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	/**
	 * Create a new category
	 *
	 * @param  object  $request
     * @return void
	 */
	public function create($request)
	{
		$category = $this->category->create([
			'name' => $request->name
		]);
	}

	/**
	 * Edit a post
	 *
	 * @param  int  $id
	 * @param  object  $request
	 * @return void
	 */
	public function edit($request, $id)
	{
		$category = $this->category->find($id)->update([
			"name" => $request->name
		]);
	}

	/**
	 * Delete a post
	 *
	 * @return void
	 */
	public function delete($id)
	{
		$category = $this->category->find($id)->delete();
	}

	/**
	 * Get categories
	 *
	 * @return object
	 */
	public function getCategories()
	{
		$categories = $this->category->get();

		$categories_ary = [];

		foreach ($categories as $category) {
			$categories_ary[] = [
				"id" => $category->id,
				"name" => $category->name,
				"created_at" => $tag->created_at ? $tag->created_at->toDateString() : null,
				"updated_at" => $tag->updated_at ? $tag->updated_at->toDateString() : null,
				"deleted_at" => $tag->deleted_at ? $tag->deleted_at->toDateString() : null
			];
		}

		return $categories_ary;
	}
}
