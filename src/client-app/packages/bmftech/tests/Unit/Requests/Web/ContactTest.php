<?php

namespace Tests\Unit\Web\Requests;

use Tests\UnitTestCase;
use BmfTech\Http\Requests\Web\ContactRequest;

class ContactTest extends UnitTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->setFormRequest(new ContactRequest());
    }

    /**
     * @test
     */
    public function testValidateSuccess()
    {
        $this->assertTrue($this->validateField('name', 'test'));
        $this->assertTrue($this->validateField('email', 'test@example.com'));
        $this->assertTrue($this->validateField('message', 'Hello World!'));
    }

    /**;
     * @test
     */
    public function testValidateRequiredFailed()
    {
        $this->assertFalse($this->validateField('name', ''));
        $this->assertFalse($this->validateField('email', ''));
        $this->assertFalse($this->validateField('message', ''));
    }

    /**
     * @test
     */
    public function testValidateEmailFailed()
    {
        $this->assertFalse($this->validateField('email', 'test'));
    }
}
