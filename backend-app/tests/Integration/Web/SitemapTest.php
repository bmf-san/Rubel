<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SitemapTest extends TestCase
{
    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testResponse()
    {
        $response = $this->get(route('web.sitemap.index'));

        $response->assertViewHas('sitemap');
    }
}
