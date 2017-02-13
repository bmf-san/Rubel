<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryContract;
use App\Models\Post;
use App\Models\Tag;

use Carbon\Carbon;

class PostRepository implements PostRepositoryContract
{
    public $post;

    public function __construct(Post $post,
                                Tag $tag
                                )
    {
        $this->post = $post;
        $this->tag = $tag;
    }

    /**
     * Create a new post
     *
     * @param  object  $request
     * @return void
     */
    public function create($request) // TODO add validation
    {
        $post = $this->post;

        $post->admin_id = $request->admin_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumb_img_path = $request->thumb_img_path;
        $post->status = $request->status;

        if ($request->status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        // TODO Add Logic for tags
        $tag = $this->tag;

        // add existed tags
        // $post->tags()->sync($tags, false);

        // create new tags - foreach??
        // $post->tag = $request->name;
        // Do not create a tag if tag has existed
    }

    /**
     * Edit a post
     *
     * @param  int  $id
 	 * @param  object  $request
     * @return void
     */
    public function edit($id, $request) // TODO add vaidation
    {
        // TODO add logic
    }

    /**
     * Update publication status of post
     *
	 * @param  int  $id
     * @param  object  $request
     * @return void
     */
    public function update($id, $request) // TODO add validation
    {
        $post = $this->post->find($id);

        $post->status = $request->status;

        if ($post->status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();
    }

    /**
     * Delete a post
     *
     * @return void
     */
    public function delete($id)
    {
        // FIXME this method doesn't work!!
        $post = $this->post->find($id)->delete();
    }

    /**
     * Get a single post
     *
     * @param  int  $id
     * @return object
     */
     public function getPost($id)
     {
        $post = $this->post->with(['admin' => function ($query) {
			$query->select('id', 'name');
		}], 'category', 'comments', 'tags')->find($id);

		return $post;
	}

    /**
     * Get posts
     *
     * @return object
     */
     public function getPosts()
     {
        $data = $this->post->with(['admin' => function ($query) {
			$query->select('id', 'name');
		}], 'category', 'comments', 'tags')->get();


        return $posts;
     }
}
