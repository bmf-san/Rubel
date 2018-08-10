<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Http\FormRequest;

abstract class UnitTestCase extends BaseTestCase
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
        $this->validator = $this->app['validator'];
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
     * Set form request
     *
     * @param FormRequest $formRequest
     * @return UnitTestCase
     */
    public function setFormRequest(FormRequest $formRequest)
    {
        $this->rules = $formRequest->rules();
        return $this;
    }

    /**
     * Validate field
     *
     * @param  string $field
     * @param  string $value;
     * @return bool
     */
    public function validateField(string $field, string $value)
    {
        return $this->getFieldValidator($field, $value)->passes();
    }

    /**
     * Get field validator
     *
     * @param  string $field
     * @param  string $value
     * @return bool
     */
    public function getFieldValidator(string $field, string $value)
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->rules[$field]]
        );
    }
}
