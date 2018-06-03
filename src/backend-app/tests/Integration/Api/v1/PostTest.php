<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Symfony\Component\HttpFoundation\Response;
use Rubel\Models\Post;
use Carbon\Carbon;

class PostTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', route('api.posts.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $this->runDefaultAdmin();

        $data = [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ];

        $response = $this->json('POST', route('api.posts.store'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        $targetId = Post::first()->id;

        $response = $this->json('GET', route('api.posts.show', $targetId));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $data = [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ];

        $targetId = Post::first()->id;

        $response = $this->json('PATCH', route('api.posts.update', $targetId), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDestroy()
    {
        $this->runDefaultAdmin();

        $targetId = Post::first()->id;

        $response = $this->json('DELETE', route('api.posts.destroy', $targetId), [], $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testSyncTagsWhenTagsAreNotExistsInDatabase()
    {
        $this->runDefaultAdmin();

        $data = [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'post_title',
            'md_content' => 'post_md_content',
            'html_content' => 'post_html_content',
            'publication_status' => 'public',
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'tags' => [
                [
                    'name' => 'tag_name'
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ];

        $response = $this->json('POST', route('api.posts.store'), $data, $this->getDefaultHeaders());

        $this->assertDatabaseHas('tags', ['name' => 'tag_name', 'name' => 'second_tag_name']);
    }
}
