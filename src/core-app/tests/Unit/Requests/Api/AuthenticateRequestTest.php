<?php

namespace Tests\Unit\Requests\Api;

use Tests\UnitTestCase;
use Rubel\Http\Requests\Api\v1\Authenticate\AuthenticateRequest;

class AuthenticateRequestTest extends UnitTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->setFormRequest(new AuthenticateRequest());
    }

    /**
     * @test
     */
    public function testValidateSuccess()
    {
        $this->assertTrue($this->validateField('email', 'test@example.com'));
        $this->assertTrue($this->validateField('password', 'password'));
    }

    /**
     * @test
     */
    public function testValidateFailed()
    {
        $this->assertFalse($this->validateField('email', ''));
        $this->assertFalse($this->validateField('password', ''));
    }


    /**
     * @test
     */
    public function testValidateEmailFailed()
    {
        $this->assertFalse($this->validateField('email', 'test'));
    }
}
