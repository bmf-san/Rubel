<?php

namespace Rubel\Http\Requests\Api\v1\Post;

use Tests\UnitTestCase;
use Rubel\Http\Requests\Api\v1\Tag\StoreTagRequest;

class StoreTagRequestTest extends UnitTestCase
{
    /**
     * Setup the test environment
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->setFormRequest(new StoreTagRequest());
    }

    /**
     * @test
     */
    public function testValidateSuccess()
    {
        $this->assertTrue($this->validateField('name', 'tag'));
        $this->assertTrue($this->validateField('name', 'tag_unique'));
    }

    /**
     * @test
     */
    public function testValidateFailed()
    {
        $this->assertFalse($this->validateField('name', ''));
    }
}
