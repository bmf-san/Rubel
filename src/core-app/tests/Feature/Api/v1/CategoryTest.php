<?php

namespace Tests\Feature\Api\v1;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Category;

class CategoryTest extends FeatureTestCase
{
    /**
     * Category id of uncategorized
     *
     * @var int
     */
    const CATEGORY_ID_OF_UNCATEGORIZED = 1;

    /**
     * @test
     */
    public function testIndex()
    {
        $this->json('GET', route('api.categories.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testStore()
    {
        $this->runDefaultAdmin();

        $this->json('POST', route('api.categories.store'), ['name' => 'category_name'], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testShow()
    {
        $this->json('GET', route('api.categories.show', Category::first()->id))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $this->json('PATCH', route('api.categories.update', Category::first()->id), ['name' => 'category_name'], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $this->json('DELETE', route('api.categories.destroy', Category::where('id', '!=', self::CATEGORY_ID_OF_UNCATEGORIZED)->first()->id), [], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }
}
