<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Admin;
use Carbon\Carbon;

abstract class FeatureTestCase extends BaseTestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Run the default admin factory
     *
     * @return void
     */
    public function runDefaultAdmin(): void
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        factory(Admin::class)->create($data);
    }

    /**
     * Get default headers with a jwt token for Api authentication
     *
     * @return array
     */
    public function getDefaultHeaders(): array
    {
        $credential = [
            'email' => 'admin@example.com',
            'password' => 'password',
        ];

        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);

        $jwtTokens = json_decode($response->getContent(), true)['token'];

        $headers = [
            "X-Requested-With" => "XMLHttpRequest",
            "Authorization" => $jwtTokens
        ];

        return $headers;
    }
}
