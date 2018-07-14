<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class SitemapTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testResponse()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertViewHas('sitemap');
    }
}
