<?php

namespace App\Repositories\Eloquent\Api;

use App\Repositories\Contracts\Api\CategoryRepositoryContract;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryContract
{
    const CATEGORY_ID_OF_UNCATEGORIZED = 1;

    private $category_model;

    public function __construct(Category $category_model)
    {
        $this->category_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array $categories
     */
    public function index()
    {
        $categories = $this->category_model->get();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param object $request
     *
     * @return array
     */
    public function store($request)
    {
        $category = $this->category_model;
        $category = $this->saveCategory($category, $request);

        return ['id' => $category->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return array $category
     */
    public function show(int $id)
    {
        $category = $this->category_model->with('posts')->find($id);

        return $category;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param object $request
     *
     * @return array
     */
    public function update($request, int $id)
    {
        $category = $this->category_model->findOrFail($id);
        $category->update($request->all());

        return ['id' => $category->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     *
     * @return array
     */
    public function destroy(int $id)
    {
        $category = $this->category_model->findOrFail($id);
        $posts = $category->posts;

        if ($posts->count() > 0) {
            foreach ($posts as $post) {
                $post->update([
                    'category_id' => self::CATEGORY_ID_OF_UNCATEGORIZED,
                ]);
            }
        }

        if ($id !== self::CATEGORY_ID_OF_UNCATEGORIZED) {
            $category = $category->delete();
        }

        return [];
    }

    /**
     * Save category
     *
     * @param  Category $category
     * @param  Object   $request
     *
     * @return int $category
     */
    private function saveCategory(Category $category, $request)
    {
        $category = $category->create([
            'name' => $request->name,
        ]);

        return $category;
    }
}
