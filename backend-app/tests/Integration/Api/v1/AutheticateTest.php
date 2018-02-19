<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class AuthenticateTest extends TestCase
{
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
