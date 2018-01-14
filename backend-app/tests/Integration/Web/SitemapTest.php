<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;

class SitemapTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testResponse()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertViewHas('sitemap');
    }
}
