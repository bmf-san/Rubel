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

        $this->json('POST', route('api.authenticate.authenticate'), $credential)->assertStatus(Response::HTTP_OK);
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

        $this->json('POST', route('api.authenticate.authenticate'), $credential)->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
