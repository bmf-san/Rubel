<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Config;

class ConfigTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', route('api.configs.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $configName = Config::first()->name;

        $data = [
            $configName => 'config_value',
        ];

        $response = $this->json('PATCH', route('api.configs.update'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
