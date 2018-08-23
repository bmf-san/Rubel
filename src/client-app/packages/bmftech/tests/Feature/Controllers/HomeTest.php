<?php

namespace Tests\Feature\Web\Controllers;;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class HomeTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.root.index'))->assertStatus(Response::HTTP_OK);
    }
}
