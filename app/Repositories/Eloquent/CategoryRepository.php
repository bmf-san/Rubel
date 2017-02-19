<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepositoryContract;

use App\Models\Category;
use App\Models\Post;

class CategoryRepository implements CategoryRepositoryContract
{
    CONST CATEGORY_ID_OF_UNCATEGORIZED = 1;

	public $category;

	public function __construct(Category $category,
                                Post $post)
	{
		$this->category = $category;
        $this->post = $post;
	}

	/**
	 * Create a new category
	 *
	 * @param  object  $request
     * @return array
	 */
	public function create($request)
	{
        $category = $this->category;

        $category->name = $request->name;

        $category->save();

        return ["id" => $category->id];
	}

	/**
	 * Edit a post
	 *
	 * @param  int  $id
	 * @param  object  $request
	 * @return array
	 */
	public function edit($request, $id)
	{
        $category = $this->category->find($id);

        $category->name = $request->name;

        $category->save();

        return ["id" => $category->id];
	}

	/**
	 * Delete a post
	 *
	 * @return array
	 */
	public function delete($id)
	{
        $category = $this->category->find($id);
        $posts = $category->posts;

        if ($posts->count() > 0) {
            foreach ($posts as $post) {
                $post->update([
                    "category_id" => self::CATEGORY_ID_OF_UNCATEGORIZED
                ]);
            }
        }

        $category = $category->delete();

        return [];
	}

	/**
	 * Get categories
	 *
	 * @return array
	 */
	public function getCategories()
	{
		$categories = $this->category->get();

		return $categories;
	}
}
