<?php
namespace Tests\Integration\Web;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Post;

class TagTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.tags.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->tags->first()->name;

        $response = $this->get(route('web.posts.tags.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
