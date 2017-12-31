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

    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $response = $this->get(route('web.posts.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testShow()
    {
        $post = factory(Post::class)->create(
            [
                'publication_status' => 'public'
            ]
        );

        $response = $this->get(route('web.posts.show', $post->title));

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
