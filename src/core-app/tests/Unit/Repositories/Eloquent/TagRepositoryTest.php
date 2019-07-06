<?php

namespace Tests\Unit\Repositories\Eloquent;

use Tests\UnitTestCase;
use Rubel\Repositories\Eloquent\TagRepository;
use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Tag;

class TagRepositoryTest extends UnitTestCase
{
    /**
     * TagRepository
     *
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->tagRepository = $this->app->make(TagRepository::class);
    }

    /**
     * @test
     */
    public function testFindAll()
    {
        $total = 5;
        factory(Tag::class, $total)->create();

        $tag = $this->tagRepository->findAll();

        $this->assertThat($tag, $this->isInstanceOf(Collection::class));
        $this->assertThat($tag->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testStore()
    {
        $attributes = ['name' => 'tag_test'];

        $tag = $this->tagRepository->store($attributes);

        $this->assertThat($tag, $this->isInstanceOf(Tag::class));
        $this->assertThat($tag->name, $this->identicalTo($attributes['name']));
    }

    /**
     * @test
     */
    public function testFindById()
    {
        $id = 1;
        factory(Tag::class)->create(['id' => $id]);

        $tag = $this->tagRepository->findById($id);

        $this->assertThat($tag, $this->isInstanceOf(Tag::class));
        $this->assertThat($tag->id, $this->identicalTo($id));
    }

    /**
     * @test
     */
    public function testUpdateById()
    {
        $id = 1;
        $attributes = ['name' => 'new_tag_test'];
        factory(Tag::class)->create([
            'id' => $id,
            'name' => 'tag_test',
        ]);

        $tag = $this->tagRepository->updateById($attributes, $id);

        $this->assertThat($tag, $this->isInstanceOf(Tag::class));
        $this->assertThat($tag->name, $this->identicalTo($attributes['name']));
    }

    /**
     * @test
     */
    public function testDestoryById()
    {
        $id = 1;

        factory(Tag::class)->create([
            'id' => $id
        ]);

        $this->tagRepository->destroyById($id);
        $this->assertThat($this->tagRepository->findAll()->count(), $this->identicalTo(0));
    }
}
