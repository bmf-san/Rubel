<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Rubel\Models\Category;

class CategoryTest extends TestCase
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
        $response = $this->get(route('web.categories.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testGetPosts()
    {
        $category = Category::first();

        $response = $this->get(route('web.posts.categories.getPosts', $category->name));

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
