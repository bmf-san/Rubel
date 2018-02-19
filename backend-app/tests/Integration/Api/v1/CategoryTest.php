<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Category;

class CategoryTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', route('api.categories.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $this->runDefaultAdmin();

        $data = [
            'name' => 'category_name'
        ];

        $response = $this->json('POST', route('api.categories.store'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $targetId = Category::first()->id;

        $response = $this->json('GET', route('api.categories.show', $targetId));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $data = [
            'name' => 'category_name',
        ];

        $targetId = Category::first()->id;

        $response = $this->json('PATCH', route('api.categories.update', $targetId), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $targetId = Category::first()->id;

        $response = $this->json('DELETE', route('api.categories.destroy', $targetId), [], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
