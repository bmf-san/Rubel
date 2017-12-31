<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeedTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertStatus(200);
    }
}
