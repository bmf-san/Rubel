<?php

namespace App\Repositories\Eloquent\Api;

use App\Repositories\Contracts\Api\TagRepositoryContract;
use App\Models\Tag;

class TagRepository implements TagRepositoryContract
{
    private $tag_model;

    public function __construct(Tag $tag_model)
    {
        $this->tag_model = $tag_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return object
     */
    public function index()
    {
        $tags = $this->tag_model->get();

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
        $tag = $this->tag_model;
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
        $tag = $this->tag_model->with('posts')->find($id);

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
        $tag = $this->tag_model->find($id);

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
        $tag = $this->tag_model->find($id)->delete();

        return [];
    }

    /**
     * Save tag
     * @param  Tag    $tag
     * @param  \Illuminate\Http\Request $request
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
