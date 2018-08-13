<?php

namespace Tests\Unit\Repositories\Eloquent;

use Tests\UnitTestCase;
use Rubel\Repositories\Eloquent\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Models\Post;
use Rubel\Models\Admin;
use Rubel\Models\Category;
use Carbon\Carbon;

class PostRepositoryTest extends UnitTestCase
{
    /**
     * PostRepository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->postRepository = $this->app->make(PostRepository::class);
    }

    /**
     * @test
     */
    public function testFindAll()
    {
        $total = 5;
        factory(Post::class, $total)->create();

        $post = $this->postRepository->findAll();

        $this->assertThat($post, $this->isInstanceOf(Collection::class)); // TODO fix
        $this->assertThat($post->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testFindAllWithPaginationLimit()
    {
        $total = 5;
        factory(Post::class, $total)->create();

        $paginationLimit = 10;
        $post = $this->postRepository->findAll($paginationLimit);

        $this->assertThat($post, $this->isInstanceOf(LengthAwarePaginator::class));
        $this->assertThat($post->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testfindAllByCategoryName()
    {
        $categoryName = 'category-name';

        factory(Category::class)->create([
            'id' => 1,
            'name' => $categoryName,
        ]);
        factory(Post::class)->create([
            'category_id' => 1,
            'publication_status' => 'public',
        ]);
        factory(Post::class)->create([
            'category_id' => 1,
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findAllByCategoryName($categoryName);

        $this->assertThat($post, $this->isInstanceOf(Collection::class));
        $this->assertThat($post->count(), $this->identicalTo(2));
    }

    /**
     * @test
     */
    public function testfindAllByCategoryNamewithPaginationLimit()
    {
        $paginationLimit = 10;
        $categoryName = 'category-name';

        factory(Category::class)->create([
            'id' => 1,
            'name' => $categoryName,
        ]);
        factory(Post::class)->create([
            'category_id' => 1,
            'publication_status' => 'public',
        ]);
        factory(Post::class)->create([
            'category_id' => 1,
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findAllByCategoryName($categoryName, $paginationLimit);

        $this->assertThat($post, $this->isInstanceOf(LengthAwarePaginator::class));
        $this->assertThat($post->count(), $this->identicalTo(2));
    }

    /**
     * @test
     */
    public function testStore()
    {
        factory(Admin::class)->create(['id' => 1]);
        factory(Category::class)->create(['id' => 1]);

        $now = Carbon::now();

        $attributes = [
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
                    'name' => 'tag_name',
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ];

        $post = $this->postRepository->store($attributes);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->admin_id, $this->identicalTo($attributes['admin_id']));
        $this->assertThat($post->category_id, $this->identicalTo($attributes['category_id']));
        $this->assertThat($post->title, $this->identicalTo($attributes['title']));
        $this->assertThat($post->md_content, $this->identicalTo($attributes['md_content']));
        $this->assertThat($post->html_content, $this->identicalTo($attributes['html_content']));
        $this->assertThat($post->publication_status, $this->identicalTo($attributes['publication_status']));
        $this->assertThat($post->published_at->toDateTimeString(), $this->identicalTo($attributes['published_at']->toDateTimeString()));
        $this->assertThat($post->created_at->toDateTimeString(), $this->identicalTo($attributes['created_at']->toDateTimeString()));
        foreach ($post->tags->pluck('name')->toArray() as $key => $postValue) {
            $this->assertThat($postValue, $this->identicalTo($attributes['tags'][$key]['name']));
        }
    }

    /**
     * @test
     */
    public function testFindById()
    {
        $id = 1;
        factory(Post::class)->create(['id' => $id]);

        $post = $this->postRepository->findById($id);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->id, $this->identicalTo($id));
    }

    /**
     * @test
     */
    public function testUpdateById()
    {
        $id = 1;

        factory(Admin::class)->create(['id' => 1]);
        factory(Category::class)->create(['id' => 1]);

        $now = Carbon::now();

        $attributes = [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'new_post_title',
            'md_content' => 'new_post_md_content',
            'html_content' => 'new_post_html_content',
            'publication_status' => 'public',
            'published_at' => $now,
            'created_at' => $now,
            'tags' => [
                [
                    'name' => 'tag_name',
                ],
                [
                    'name' => 'second_tag_name',
                ],
            ]
        ];

        factory(Post::class)->create([
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'new_post_title',
            'md_content' => 'new_post_md_content',
            'html_content' => 'new_post_html_content',
            'publication_status' => 'private',
            'published_at' => $now,
            'created_at' => $now,
        ]);

        $post = $this->postRepository->updateById($attributes, $id);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->admin_id, $this->identicalTo($attributes['admin_id']));
        $this->assertThat($post->category_id, $this->identicalTo($attributes['category_id']));
        $this->assertThat($post->title, $this->identicalTo($attributes['title']));
        $this->assertThat($post->md_content, $this->identicalTo($attributes['md_content']));
        $this->assertThat($post->html_content, $this->identicalTo($attributes['html_content']));
        $this->assertThat($post->publication_status, $this->identicalTo($attributes['publication_status']));
        $this->assertThat($post->published_at->toDateTimeString(), $this->identicalTo($attributes['published_at']->toDateTimeString()));
        $this->assertThat($post->created_at->toDateTimeString(), $this->identicalTo($attributes['created_at']->toDateTimeString()));
        foreach ($post->tags->pluck('name')->toArray() as $key => $postValue) {
            $this->assertThat($postValue, $this->identicalTo($attributes['tags'][$key]['name']));
        }
    }

    /**
     * @test
     */
    public function testDestroyById()
    {
        $id = 1;

        factory(Post::class)->create([
            'id' => $id
        ]);

        $this->postRepository->destroyById($id);
        $this->assertThat($this->postRepository->findAll()->count(), $this->identicalTo(0));
    }
}