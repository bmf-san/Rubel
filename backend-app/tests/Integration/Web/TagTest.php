<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Tag;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.tags.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetPosts()
    {
        $targetName = Tag::first()->name;

        $response = $this->get(route('web.posts.tags.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
