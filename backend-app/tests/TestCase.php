<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Set up the application
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * Tear down the application
     *
     * @return void
     */
    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    /**
     * Get headers with a jwt token for Api authentication
     *
     * @return array
     */
    public function getHeaders(): array
    {
        $response = $this->json('POST', route('api.authenticate'), [
            "email" => env('ADMIN_EMAIL'),
            "password" => env('ADMIN_PASSWORD')
        ]);

        $jwtTokens = json_decode($response->getContent(), true)['token'];

        $headers = [
            "X-Requested-With" => "XMLHttpRequest",
            "Authorization" => $jwtTokens
        ];

        return $headers;
    }
}
