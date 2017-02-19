<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\TagRepositoryContract;
use App\Models\Tag;
use App\Models\Post;

class TagRepository implements TagRepositoryContract
{
	public $tag;

	public function __construct(Tag $tag,
                                Post $post
                                )
	{
		$this->tag = $tag;
		$this->post = $post;
	}

	/**
	 * Edit a tag
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
