<?php

namespace Tests\Unit\Repositories\Eloquent;

use Tests\UnitTestCase;
use Rubel\Repositories\Eloquent\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Models\Post;
use Rubel\Models\Tag;
use Rubel\Models\TagPost;
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

        $this->assertThat($post, $this->isInstanceOf(Collection::class));
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
    public function testPublished()
    {
        $publicationStatus = 'public';

        factory(Post::class)->create([
            'publication_status' => $publicationStatus,
        ]);

        $post = $this->postRepository->findPublished();

        $this->assertThat($post, $this->isInstanceOf(Collection::class));
        $this->assertThat($post->first()->publication_status, $this->identicalto($publicationStatus));
    }

    /**
     * @test
     */
    public function testPublishedWithPagination()
    {
        $paginationLimit = 10;
        $publicationStatus = 'public';

        factory(Post::class)->create([
            'publication_status' => $publicationStatus,
        ]);

        $post = $this->postRepository->findPublished($paginationLimit);

        $this->assertThat($post, $this->isInstanceOf(LengthAwarePaginator::class));
        $this->assertThat($post->first()->publication_status, $this->identicalto($publicationStatus));
    }

    /**
     * @test
     */
    public function testFindByRandom()
    {
        $total = 5;
        factory(Post::class, $total)->create([
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findByRandom();

        $this->assertThat($post, $this->isInstanceOf(Collection::class));
        $this->assertThat($post->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testFindByRandomPagination()
    {
        $paginationLimit = 10;
        $total = 5;
        factory(Post::class, $total)->create([
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findByRandom($paginationLimit);

        $this->assertThat($post, $this->isInstanceOf(LengthAwarePaginator::class));
        $this->assertThat($post->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testFindLatest()
    {
        $now = Carbon::now();

        factory(Post::class, 5)->create([
            'created_at' => $now->subDay(),
        ]);
        factory(Post::class)->create([
            'created_at' => $now,
        ]);

        $post = $this->postRepository->findLatest();

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->created_at->toDateTimeString(), $this->identicalTo($now->toDateTimeString()));
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
    public function testFindAllByCategoryName()
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
    public function testFindByTitle()
    {
        $title = 'public';

        factory(Post::class)->create([
            'title' => $title,
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findByTitle($title);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->title, $this->identicalTo($title));
    }

    /**
     * @test
     */
    public function testfindRelatedPost()
    {
        factory(Tag::class)->create([
            'id' => 1,
            'name' => 'tag-1',
        ]);
        $targetPost = factory(Post::class)->create([
            'id' => 1,
            'title' => 'post-1',
        ]);
        factory(Post::class)->create([
            'id' => 2,
            'title' => 'post-2',
        ]);
        factory(Post::class)->create([
            'id' => 3,
            'title' => 'post-3',
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 1,
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 2,
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 3,
        ]);

        $post = $this->postRepository->findRelatedPost($targetPost);

        $this->assertThat($post, $this->isInstanceOf(Collection::class));
        $this->assertThat($post->count(), $this->identicalTo(2));
    }

    /**
     * @test
     */
    public function testfindRelatedPostWithPagination()
    {
        $paginationLimit = 10;

        factory(Tag::class)->create([
            'id' => 1,
            'name' => 'tag-1',
        ]);
        $targetPost = factory(Post::class)->create([
            'id' => 1,
            'title' => 'post-1',
        ]);
        factory(Post::class)->create([
            'id' => 2,
            'title' => 'post-2',
        ]);
        factory(Post::class)->create([
            'id' => 3,
            'title' => 'post-3',
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 1,
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 2,
        ]);
        factory(TagPost::class)->create([
            'tag_id' => 1,
            'post_id' => 3,
        ]);

        $post = $this->postRepository->findRelatedPost($targetPost, $paginationLimit);

        $this->assertThat($post, $this->isInstanceOf(LengthAwarePaginator::class));
        $this->assertThat($post->count(), $this->identicalTo(2));
    }

    /**
     * @test
     */
    public function testFindPreviousPost()
    {
        factory(Post::class)->create([
            'id' => 1,
            'publication_status' => 'public',
        ]);
        factory(Post::class)->create([
            'id' => 2,
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findPreviousPost(2);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->id, $this->identicalTo(1));
    }

    /**
     * @test
     */
    public function testFindNextPost()
    {
        factory(Post::class)->create([
            'id' => 1,
            'publication_status' => 'public',
        ]);
        factory(Post::class)->create([
            'id' => 2,
            'publication_status' => 'public',
        ]);

        $post = $this->postRepository->findNextPost(1);

        $this->assertThat($post, $this->isInstanceOf(Post::class));
        $this->assertThat($post->id, $this->identicalTo(2));
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
