<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        // TODO write test code exactly
        factory(App\Models\Post::class)->create();

        $response = $this->json('GET', route('posts'));

        $response->assertStatus(200);
    }
}
