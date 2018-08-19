<?php

namespace Rubel\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Repositories\Contracts\CategoryRepositoryContract;
use Rubel\Models\Category;

class CategoryRepository implements CategoryRepositoryContract
{
    /**
     * Category id of uncategorized
     *
     * @var int
     */
    const CATEGORY_ID_OF_UNCATEGORIZED = 1;

    /**
     * Category
     *
     * @var Category
     */
    private $categoryModel;

    /**
     * CategoryRepository constructor
     *
     * @param Category $categoryModel
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection
    {
        return $this->categoryModel->orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Category
     */
    public function store(array $attributes): Category
    {
        return $this->categoryModel->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Category
     */
    public function findById(int $id): Category
    {
        return $this->categoryModel->with('posts')->find($id);
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  array $attributes
     * @param  int    $id
     * @return Category
     */
    public function updateById(array $attributes, int $id): Category
    {
        $this->categoryModel->findOrFail($id)->update($attributes);

        return $this->categoryModel->findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return void
     */
    public function destroyById(int $id): void
    {
        $category = $this->categoryModel->findOrFail($id);
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
    }
}
