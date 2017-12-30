<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Tag;

class TagTest extends TestCase
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
        $response = $this->json('GET', route('api.tags.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testStore()
    {
        $data = [
            'name' => 'HereIsTag'
        ];

        $response = $this->json('POST', route('api.tags.store'), $data, $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testShow()
    {
        $response = $this->json('GET', route('api.tags.show', 1));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'HereIsTag'
        ];

        $response = $this->json('PATCH', route('api.tags.update', Tag::first()->id), $data, $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', route('api.tags.destroy', Tag::first()->id), [], $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
