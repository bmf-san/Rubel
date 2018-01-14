<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class AuthenticateTest extends TestCase
{
    use DatabaseMigrations;

    public function testAuthenticateSuccess()
    {
        $this->runDefaultAdmin();

        $credential = [
            'email' => 'admin@example.com',
            'password' => 'password',
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testAuthenticateFailed()
    {
        $this->runDefaultAdmin();

        $credential = [
            'email' => 'failed_admin@example.com',
            'password' => 'failed_password',
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
