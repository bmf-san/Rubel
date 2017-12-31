<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Tag;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $response = $this->get(route('web.tags.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testGetPosts()
    {
        $tag = Tag::first();

        $response = $this->get(route('web.posts.tags.getPosts', $tag->name));

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
