<?php

namespace Tests\Feature\Web\Controllers;;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Post;

class PostTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.posts.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testShow()
    {
        $targetTitle = Post::where('publication_status', 'public')->first()->title;

        $this->get(route('web.posts.show', $targetTitle))->assertStatus(Response::HTTP_OK);
    }
}
