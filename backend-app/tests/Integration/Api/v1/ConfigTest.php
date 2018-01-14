<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Config;

class ConfigTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->json('GET', route('api.configs.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $data = [
            'title' => 'HereIsTitle',
            'sub_title' => 'HereIsSubTItle'
        ];

        $response = $this->json('PATCH', route('api.configs.update'), $data, $this->getHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
