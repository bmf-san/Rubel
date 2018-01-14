<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Post;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.posts.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $targetTitle = Post::first()->title;
        $response = $this->get(route('web.posts.show', $targetTitle));

        $response->assertStatus(Response::HTTP_OK);
    }
}
