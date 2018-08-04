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
        $this->get(route('web.categories.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->category->name;

        $this->get(route('web.posts.categories.getPosts', $targetName))->assertStatus(Response::HTTP_OK);
    }
}
