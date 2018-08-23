<?php

namespace Tests\Feature\Web\Controllers;;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class SitemapTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.sitemap.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testResponse()
    {
        $this->get(route('web.sitemap.index'))->assertViewHas('sitemap');
    }
}
