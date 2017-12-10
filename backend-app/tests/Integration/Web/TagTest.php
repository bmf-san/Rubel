<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.tags.index'));

        $response->assertStatus(200);
    }

    public function testGetPosts()
    {
        $tag = Tag::first();

        $response = $this->get(route('web.posts.tags.getPosts', $tag->name));

        $response->assertStatus(200);
    }
}
