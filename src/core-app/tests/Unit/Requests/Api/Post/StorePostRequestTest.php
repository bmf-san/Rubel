<?php

namespace Rubel\Http\Requests\Api\v1\Post;

use Tests\UnitTestCase;
use Rubel\Http\Requests\Api\v1\Post\StorePostRequest;

class StorePostRequestTest extends UnitTestCase
{
    /**
     * Setup the test environment
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->setFormRequest(new StorePostRequest());
    }

    /**
     * @test
     */
    public function testValidateSuccess()
    {
        $this->assertTrue($this->validateField('title', 'Hello World'));
        $this->assertTrue($this->validateField('md_content', '#header - hello world'));
    }

    /**
     * @test
     */
    public function testValidateFailed()
    {
        $this->assertFalse($this->validateField('title', ''));
        $this->assertFalse($this->validateField('md_content', ''));
    }
}
