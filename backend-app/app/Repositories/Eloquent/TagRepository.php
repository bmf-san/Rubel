<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\TagRepositoryContract;
use App\Models\Tag;
use App\Models\Post;

class TagRepository implements TagRepositoryContract
{
    private $tag;

    public function __construct(Tag $tag, Post $post)
    {
        $this->tag = $tag;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return object
     */
    public function index()
    {
        $tags = $this->tag->get();

        return $tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param object $request
     *
     * @return array
     */
    public function store($request)
    {
        $tag = $this->tag;
        $tag = $this->saveTag($tag, $request);

        return ['id' => $tag->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return array $tag
     */
    public function show(int $id)
    {
        $tag = $this->tag->with('posts')->find($id);

        return $tag;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param object $request
     *
     * @return array
     */
    public function update($request, Int $id)
    {
        $tag = $this->tag->find($id);

        $tag->update($request->all());

        return ['id' => $tag->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @param int $id
     *
     * @return array
     */
    public function destroy(Int $id)
    {
        $tag = $this->tag->find($id)->delete();

        return [];
    }

    /**
     * Save tag
     * @param  Tag    $tag
     * @param  Object $request
     * @return int    $tga
     */
    private function saveTag(Tag $tag, $request)
    {
        $tag = $tag->create([
            'name' => $request->name,
        ]);

        return $tag;
    }
}
