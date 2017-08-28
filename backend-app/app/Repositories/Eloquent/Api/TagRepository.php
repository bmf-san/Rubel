<?php

namespace App\Repositories\Eloquent\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Api\TagRepositoryContract;
use App\Models\Tag;

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
    public function index(): Collection
    {
        $tags = $this->tagModel->get();

        return $tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store($request): array
    {
        $tag = $this->tagModel;
        $tag = $this->saveTag($tag, $request);

        return ['id' => $tag->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function show(int $id): Collection
    {
        $tag = $this->tagModel->with('posts')->find($id);

        return $tag;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Int    $id
     * @return array
     */
    public function update($request, Int $id): array
    {
        $tag = $this->tagModel->find($id);

        $tag->update($request->all());

        return ['id' => $tag->id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return array
     */
    public function destroy(Int $id): array
    {
        $tag = $this->tagModel->find($id)->delete();

        return [];
    }

    /**
     * Save Tag
     * @param  Tag    $tag
     * @param  \Illuminate\Http\Request $request
     * @return Tag
     */
    private function saveTag(Tag $tag, $request): Tag
    {
        $tag = $tag->create([
            'name' => $request->name,
        ]);

        return $tag;
    }
}
