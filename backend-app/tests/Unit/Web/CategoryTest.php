<?php
namespace Tests\Unit\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.categories.index'));

        $response->assertStatus(200);
    }

    public function testGetPosts()
    {
        $category = Category::first();

        $response = $this->get(route('web.posts.categories.getPosts', $category->name));

        $response->assertStatus(200);
    }
}
