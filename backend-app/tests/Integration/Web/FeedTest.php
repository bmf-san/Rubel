<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;

class FeedTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testResponseTitle()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('title');
    }

    public function testResponseSubTitle()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('subTitle');
    }

    public function testResponseUpdatedAt()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('updatedAt');
    }

    public function testResponseCurrentDate()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('currentDate');
    }

    public function testResponseCurrentPosts()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('posts');
    }
}
