<?php
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Rubel\Models\Admin;

abstract class TestCase extends BaseTestCase
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
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Set up the application
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * Tear down the application
     *
     * @return void
     */
    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    /**
     * Run the admin factory
     *
     * @param array $data
     * @return void
     */
    public function runAdmin($data = []): void
    {
        factory(Admin::class)->create($data);
    }

    /**
     * Get headers with a jwt token for Api authentication
     *
     * @param array $credential
     * @return array
     */
    public function getHeaders($credential = []): array
    {
        $response = $this->json('POST', route('api.authenticate.authenticate'), $credential);
        dd($response);
        $jwtTokens = json_decode($response->getContent(), true)['token'];

        $headers = [
            "X-Requested-With" => "XMLHttpRequest",
            "Authorization" => $jwtTokens
        ];

        return $headers;
    }
}
