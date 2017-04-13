<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Models\Category;
use App\Models\Post;

class CategoryRepository implements CategoryRepositoryContract
{
    const CATEGORY_ID_OF_UNCATEGORIZED = 1;

    private $category;

    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $categories = $this->category->get();

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
        $category = $this->category;
        $category = $this->saveCategory($category, $request);

        return ['id' => $category->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id [description]
     *
     * @return [type] [description]
     */
    public function show(int $id)
    {
        $category = $this->category->with('posts')->find($id);

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
        $category = $this->category->findOrFail($id);
        $category->update($request->all());

        return ['id' => $category->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(int $id)
    {
        $category = $this->category->findOrFail($id);
        $posts = $category->posts;

        if ($posts->count() > 0) {
            foreach ($posts as $post) {
                $post->update([
                    'category_id' => (int) self::CATEGORY_ID_OF_UNCATEGORIZED,
                ]);
            }
        }

        if ($id !== (int) self::CATEGORY_ID_OF_UNCATEGORIZED) {
            $category = $category->delete();
        }

        return [];
    }

    private function saveCategory(Category $category, $request)
    {
        $category = $category->create([
            'name' => $request->name,
        ]);

        return $category;
    }
}
