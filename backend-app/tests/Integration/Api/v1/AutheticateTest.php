<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticateTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testAuthenticate()
    {
        $data = [
            'email' => config('rubel.admin.email'),
            'password' => config('rubel.admin.password')
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $data);

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
