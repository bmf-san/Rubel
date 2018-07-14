<?php

namespace Tests\Feature\Api\v1;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Tag;

class TagTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->json('GET', route('api.tags.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testStore()
    {
        $this->runDefaultAdmin();

        $data = [
            'name' => 'tag_name',
        ];

        $response = $this->json('POST', route('api.tags.store'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testShow()
    {
        $targetId = Tag::first()->id;

        $response = $this->json('GET', route('api.tags.show', $targetId));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $response = $this->json('PATCH', route('api.tags.update', Tag::first()->id), ['name' => 'tag_name'], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $response = $this->json('DELETE', route('api.tags.destroy', Tag::first()->id), [], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
