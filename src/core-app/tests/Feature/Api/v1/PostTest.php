<?php

namespace Tests\Feature\Api\v1;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Rubel\Models\Post;
use Carbon\Carbon;

class PostTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $response = $this->json('GET', route('api.posts.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testStore()
    {
        $this->runDefaultAdmin();

        $now = Carbon::now();

        $response = $this->json('POST', route('api.posts.store'), [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => $now,
            'created_at' => $now,
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testShow()
    {
        $response = $this->json('GET', route('api.posts.show', Post::first()->id));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $now = Carbon::now();

        $response = $this->json('PATCH', route('api.posts.update', Post::first()->id), [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => $now,
            'created_at' => $now,
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]

        ], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $response = $this->json('DELETE', route('api.posts.destroy', Post::first()->id), [], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testSyncTagsWhenTagsAreNotExistsInDatabase()
    {
        $this->runDefaultAdmin();

        $now = Carbon::now();

        $response = $this->json('POST', route('api.posts.store'), [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => $now,
            'created_at' => $now,
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ], $this->getDefaultHeaders());

        $this->assertDatabaseHas('tags', ['name' => 'tag_name', 'name' => 'second_tag_name']);
    }
}
