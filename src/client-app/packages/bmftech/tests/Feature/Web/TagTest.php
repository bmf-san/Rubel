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
        $response = $this->get(route('web.tags.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->tags->first()->name;

        $response = $this->get(route('web.posts.tags.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
