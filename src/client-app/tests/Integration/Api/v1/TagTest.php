<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Http\Response;
use Rubel\Models\Tag;

class TagTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', route('api.tags.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $this->runDefaultAdmin();

        $data = [
            'name' => 'tag_name',
        ];

        $response = $this->json('POST', route('api.tags.store'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $targetId = Tag::first()->id;

        $response = $this->json('GET', route('api.tags.show', $targetId));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $data = [
            'name' => 'tag_name',
        ];

        $targetId = Tag::first()->id;

        $response = $this->json('PATCH', route('api.tags.update', $targetId), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $targetId = Tag::first()->id;

        $response = $this->json('DELETE', route('api.tags.destroy', $targetId), [], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
