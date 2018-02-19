<?php
namespace Tests\Integration\Web;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Post;

class PostTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.posts.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $targetTitle = Post::where('publication_status', 'public')->first()->title;

        $response = $this->get(route('web.posts.show', $targetTitle));

        $response->assertStatus(Response::HTTP_OK);
    }
}
