<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Post;

class TagTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.tags.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->tags->first()->name;

        $this->get(route('web.posts.tags.getPosts', $targetName))->assertStatus(Response::HTTP_OK);
    }
}
