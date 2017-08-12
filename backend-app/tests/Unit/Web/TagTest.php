<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.tags'));

        $response->assertStatus(200);
    }

    public function testGetPosts()
    {
        $tag = \App\Models\Tag::first();

        $response = $this->get(route('web.posts.tag', $tag->name));

        $response->assertStatus(200);
    }
}
