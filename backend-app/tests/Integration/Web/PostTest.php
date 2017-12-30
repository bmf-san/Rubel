<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Post;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.posts.index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $post = factory(Post::class)->create(
            [
                'publication_status' => 'public'
            ]
        );

        $response = $this->get(route('web.posts.show', $post->title));

        $response->assertStatus(200);
    }
}
