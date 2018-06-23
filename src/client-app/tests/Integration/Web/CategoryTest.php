<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Http\Response;
use Rubel\Models\Post;

class CategoryTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.categories.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetPosts()
    {
        $targetName = Post::where('publication_status', 'public')->first()->category->name;

        $response = $this->get(route('web.posts.categories.getPosts', $targetName));

        $response->assertStatus(Response::HTTP_OK);
    }
}
