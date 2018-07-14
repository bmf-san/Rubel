<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class ContactTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->get(route('web.root.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
