<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Foundation\Http\FormRequest;

class UnitTestCase extends BaseTestCase
{
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
