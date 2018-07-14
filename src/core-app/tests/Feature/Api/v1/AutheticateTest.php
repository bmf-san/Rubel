<?php

namespace Tests\Feature\Api\v1;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Carbon\Carbon;

class AuthenticateTest extends FeatureTestCase
{
    /**
     * @test
     */
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

    /**
     * @test
     */
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
