<?php

namespace Rubel\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Repositories\Contracts\TagRepositoryContract;
use Rubel\Models\Tag;

class TagRepository implements TagRepositoryContract
{
    /**
     * Tag
     *
     * @var Tag
     */
    private $tagModel;

    /**
     * TagRepository constructor
     *
     * @param Tag $tagModel
     */
    public function __construct(Tag $tagModel)
    {
        $this->tagModel = $tagModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection
    {
        $tags = $this->tagModel->orderBy('created_at', 'desc')->get();

        return $tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Tag
     */
    public function store(array $attributes): Tag
    {
        return $this->tagModel->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Tag
     */
    public function findById(int $id): Tag
    {
        $tag = $this->tagModel->with('posts')->find($id);

        return $tag;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  array $attributes
     * @param  Int    $id
     * @return Tag
     */
    public function updateById(array $attributes, Int $id): Tag
    {
        $this->tagModel->findOrFail($id)->update($attributes);

        return $this->tagModel->findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return void
     */
    public function destroyById(Int $id): void
    {
        $this->tagModel->find($id)->delete();
    }
}
