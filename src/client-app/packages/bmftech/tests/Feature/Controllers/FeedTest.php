<?php

namespace Tests\Feature\Web\Controllers;;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;

class FeedTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.feed.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testResponseTitle()
    {
        $this->get(route('web.feed.index'))->assertViewHas('title');
    }

    /**
     * @test
     */
    public function testResponseSubTitle()
    {
        $this->get(route('web.feed.index'))->assertViewHas('subTitle');
    }

    /**
     * @test
     */
    public function testResponseUpdatedAt()
    {
        $this->get(route('web.feed.index'))->assertViewHas('updatedAt');
    }

    /**
     * @test
     */
    public function testResponseCurrentDate()
    {
        $this->get(route('web.feed.index'))->assertViewHas('currentDate');
    }

    /**
     * @test
     */
    public function testResponseCurrentPosts()
    {
        $this->get(route('web.feed.index'))->assertViewHas('posts');
    }
}
