<?php

namespace Tests\Unit\Repositories\Eloquent;

use Tests\UnitTestCase;
use Rubel\Repositories\Eloquent\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Category;

class CategoryRepositoryTest extends UnitTestCase
{
    /**
     * CategoryRepository
     *
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->categoryRepository = $this->app->make(CategoryRepository::class);
    }

    /**
     * @test
     */
    public function testFindAll()
    {
        $total = 5;
        factory(Category::class, $total)->create();

        $category = $this->categoryRepository->findAll();

        $this->assertThat($category, $this->isInstanceOf(Collection::class));
        $this->assertThat($category->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testStore()
    {
        $attributes = ['name' => 'category_test'];

        $category = $this->categoryRepository->store($attributes);

        $this->assertThat($category, $this->isInstanceOf(Category::class));
        $this->assertThat($category->name, $this->identicalTo($attributes['name']));
    }

    /**
     * @test
     */
    public function testFindById()
    {
        $id = 1;
        factory(Category::class)->create(['id' => $id]);

        $category = $this->categoryRepository->findById($id);

        $this->assertThat($category, $this->isInstanceOf(Category::class));
        $this->assertThat($category->id, $this->identicalTo($id));
    }

    /**
     * @test
     */
    public function testUpdateById()
    {
        $id = 1;
        $attributes = ['name' => 'new_category_test'];
        factory(Category::class)->create([
            'id' => $id,
            'name' => 'category_test',
        ]);

        $category = $this->categoryRepository->updateById($attributes, $id);

        $this->assertThat($category, $this->isInstanceOf(Category::class));
        $this->assertThat($category->name, $this->identicalTo($attributes['name']));
    }

    /**
     * @test
     */
    public function testDestoryById()
    {
        $id = 2; // 1 is used as category_id of uncategorized

        factory(Category::class)->create([
            'id' => $id
        ]);

        $this->categoryRepository->destroyById($id);
        $this->assertThat($this->categoryRepository->findAll()->count(), $this->identicalTo(0));
    }
}
