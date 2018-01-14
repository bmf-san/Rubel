<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

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
        $admin = [
            'name' => config('rubel.admin.name'),
            'email' => config('rubel.admin.email'),
            'password' => bcrypt(config('rubel.admin.password')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->runAdmin($admin);

        $data = [
            'title' => 'HereIsTitle',
            'sub_title' => 'HereIsSubTItle'
        ];

        $credential = [
            'email' => config('rubel.admin.email'),
            'password' => bcrypt(config('rubel.admin.password')),
        ];

        $response = $this->json('PATCH', route('api.configs.update'), $data, $this->getHeaders($credential));

        $response->assertStatus(Response::HTTP_OK);
    }
}
