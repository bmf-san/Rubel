<?php
namespace Tests\Integration\Web;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Category;

class CategoryTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.categories.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetPosts()
    {
        $targetName = Category::first()->name;

        $response = $this->get(route('web.posts.categories.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
