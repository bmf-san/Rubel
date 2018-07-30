<?php

namespace Tests\Feature\Api\v1;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Config;

class ConfigTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->json('GET', route('api.configs.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $this->json('PATCH', route('api.configs.update'), [
            'title' => 'new_title',
            'sub_title' => 'new_sub_title',
        ], $this->getDefaultHeaders())->assertStatus(Response::HTTP_OK);
    }
}
