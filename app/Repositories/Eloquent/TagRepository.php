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
	 * Edit a post
	 *
	 * @param  int  $id
	 * @param  object  $request
	 * @return void
	 */
	public function edit($request, $id)
	{
        $tag = $this->tag->find($id);

        $tag->name = $request->name;

        $tag->save();
	}

	/**
	 * Delete a tag
	 *
	 * @return void
	 */
	public function delete($id)
	{
        // TODO check wether this method works collectly
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

		return $tags;
	}
}
