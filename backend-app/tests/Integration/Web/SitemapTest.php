<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SitemapTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertStatus(200);
    }
}
