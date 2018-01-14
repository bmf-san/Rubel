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
        $admin = [
            'name' => config('rubel.admin.name'),
            'email' => config('rubel.admin.email'),
            'password' => bcrypt(config('rubel.admin.password')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->runAdmin($admin);

        $credential = [
            'email' => config('rubel.admin.email'),
            'password' => config('rubel.admin.password'),
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testAuthenticateFailed()
    {
        $admin = [
            'name' => config('rubel.admin.name'),
            'email' => config('rubel.admin.email'),
            'password' => bcrypt(config('rubel.admin.password')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->runAdmin($admin);

        $credential = [
            'email' => 'fail_email@example.com',
            'password' => bcrypt('FailedPassword'),
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
