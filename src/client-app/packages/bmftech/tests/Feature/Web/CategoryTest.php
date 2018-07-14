<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Post;

class CategoryTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->get(route('web.categories.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->category->name;

        $response = $this->get(route('web.posts.categories.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
