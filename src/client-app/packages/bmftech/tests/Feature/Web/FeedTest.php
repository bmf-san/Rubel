<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class FeedTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testResponseTitle()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('title');
    }

    /**
     * @test
     */
    public function testResponseSubTitle()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('subTitle');
    }

    /**
     * @test
     */
    public function testResponseUpdatedAt()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('updatedAt');
    }

    /**
     * @test
     */
    public function testResponseCurrentDate()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('currentDate');
    }

    /**
     * @test
     */
    public function testResponseCurrentPosts()
    {
        $response = $this->get(route('web.feed.index'));

        $response->assertViewHas('posts');
    }
}
