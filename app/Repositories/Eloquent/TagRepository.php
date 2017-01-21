<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\TagRepositoryContract;
use App\Models\Tag;

class TagRepository implements TagRepositoryContract
{
	public $tag;

	public function __construct(Tag $tag)
	{
		$this->tag = $tag;
	}

	/**
	 * Create a new tag
	 *
	 * @param  object  $request
	 * @return void
	 */
	public function create($request)
	{
		$tag = $this->tag->create([
			'name' => $request->name
		]);
	}

	/**
	 * Edit a post
	 *
	 * @param  int  $id
	 * @param  object  $request
	 * @return void
	 */
	public function edit($request, $id)
	{
		$tag = $this->tag->find($id)->update([
			'name' => $request->name
		]);
	}

	/**
	 * Delete a tag
	 *
	 * @return void
	 */
	public function delete($id)
	{
		$tag = $this->tag->find($id)->delete();
	}

	/**
	 * Get tags
	 *
	 * @return object
	 */
	public function getTags()
	{
		$tags = $this->tag->get();

		$tags_ary = [];

		foreach ($tags as $tag) {
			$tags_ary[] = [
				'id' => $tag->id,
				"name" => $tag->name,
				"created_at" => $tag->created_at,
				"updated_at" => $tag->updated_at,
				"deleted_at" => $tag->deleted_at
			];
		}

		return $tags_ary;
	}
}
