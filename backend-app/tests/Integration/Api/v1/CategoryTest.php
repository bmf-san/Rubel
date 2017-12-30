<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Category;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $response = $this->json('GET', route('api.categories.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testStore()
    {
        $data = [
            'name' => 'HereIsTag'
        ];

        $response = $this->json('POST', route('api.categories.store'), $data, $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testShow()
    {
        $response = $this->json('GET', route('api.categories.show', 1));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'HereIsTag'
        ];

        $response = $this->json('PATCH', route('api.categories.update', Category::first()->id), $data, $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', route('api.categories.destroy', Category::first()->id), [], $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
