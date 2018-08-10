<?php

namespace Rubel\Http\Requests\Api\v1\Category;

use Tests\UnitTestCase;
use Rubel\Http\Requests\Api\v1\Category\StoreCategoryRequest;

class StoreCategoryRequestTest extends UnitTestCase
{
    /**
     * Setup the test environment
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->setFormRequest(new StoreCategoryRequest());
    }

    /**
     * @test
     */
    public function testValidateSuccess()
    {
        $this->assertTrue($this->validateField('name', 'category'));
        $this->assertTrue($this->validateField('name', 'category_unique'));
    }

    /**
     * @test
     */
    public function testValidateFailed()
    {
        $this->assertFalse($this->validateField('name', ''));
    }
}
