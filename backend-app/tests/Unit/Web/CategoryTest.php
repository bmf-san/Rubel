<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.categories'));

        $response->assertStatus(200);
    }

    public function testGetPosts()
    {
        $category = \App\Models\Category::first();

        $response = $this->get(route('web.posts.category', $category->name));

        $response->assertStatus(200);
    }
}
