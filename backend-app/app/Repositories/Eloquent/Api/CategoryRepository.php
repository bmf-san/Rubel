<?php

namespace App\Repositories\Eloquent\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Api\CategoryRepositoryContract;
use App\Models\Category;

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
    public function index(): Collection
    {
        // TODO Remove a orderBy method after implementation of search api.
        $categories = $this->categoryModel->orderBy('created_at', 'desc')->get();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store($request): array
    {
        $category = $this->categoryModel;
        $category = $this->saveCategory($category, $request);

        return ['id' => $category->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Category
     */
    public function show(int $id): Category
    {
        $category = $this->categoryModel->with('posts')->find($id);

        return $category;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int    $id
     * @return array
     */
    public function update($request, int $id): array
    {
        $category = $this->categoryModel->findOrFail($id);
        $category->update($request->all());

        return ['id' => $category->id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return array
     */
    public function destroy(int $id): array
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

        return [];
    }

    /**
     * Save category
     *
     * @param  Category $category
     * @param  \Illuminate\Http\Request $request
     * @return Category
     */
    private function saveCategory(Category $category, $request): Category
    {
        $category = $category->create([
            'name' => $request->name,
        ]);

        return $category;
    }
}
