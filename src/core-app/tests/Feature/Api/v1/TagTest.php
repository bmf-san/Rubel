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
        $this->json('GET', route('api.tags.index'))->assertStatus(Response::HTTP_OK);
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

        $this->json('POST', route('api.tags.store'), $data, $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testShow()
    {
        $targetId = Tag::first()->id;

        $this->json('GET', route('api.tags.show', $targetId))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $this->json('PATCH', route('api.tags.update', Tag::first()->id), ['name' => 'tag_name'], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $this->json('DELETE', route('api.tags.destroy', Tag::first()->id), [], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }
}
