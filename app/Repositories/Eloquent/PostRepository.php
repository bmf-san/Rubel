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
     * @return string
     */
    public function create($request)
    {
        $post = $this->post;

        $post->admin_id = $request->admin_id;  // FIXME change this value to Authentication info -> admin_id
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumb_img_path = $request->thumb_img_path;
        $post->status = $request->status;

        if ($request->status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        if (!empty($request->tag)) {
            foreach ($request->tag as $request_tag) {
                $request_tag_array[] =  $request_tag["name"];
            }

            $exist_tag_collection = $tag->whereIn('name', $request_tag_array)->get();

            $exist_tag_name_array = $exist_tag_collection->pluck('name')->toArray();
            $exist_tag_id_array = $exist_tag_collection->pluck('id')->toArray();
            $new_tag_name_array = array_diff($request_tag_array, $exist_tag_name_array);

            // create new tags
            if (!empty($new_tag_name_array)) {
                foreach ($new_tag_name_array as $new_tag_name) {
                    $tag->create([
                        'name' => $new_tag_name
                    ]);
                }

                $new_tag_id_array = $tag->whereIn('name', $new_tag_name_array)->get()->pluck('id')->toArray();
                $tag_id_array = array_merge($exist_tag_id_array, $new_tag_id_array);
            } else {
                $tag_id_array = $exist_tag_id_array;
            }
        } else {
            $tag_id_array = [];
        }

        $post->tags()->sync($tag_id_array);

        return ["id" => $post->id];
    }

    /**
     * Edit a post
     *
     * @param  int  $id
 	 * @param  object  $request
     * @return string
     */
    public function edit($request, $id)
    {
        $post = $this->post->find($id);

        $post->admin_id = $request->admin_id;  // FIXME change this value to Authentication info -> admin_id
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumb_img_path = $request->thumb_img_path;
        $post->status = $request->status;

        if ($request->status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        if (!empty($request->tag)) {
            foreach ($request->tag as $request_tag) {
                $request_tag_array[] =  $request_tag["name"];
            }

            $exist_tag_collection = $tag->whereIn('name', $request_tag_array)->get();

            $exist_tag_name_array = $exist_tag_collection->pluck('name')->toArray();
            $exist_tag_id_array = $exist_tag_collection->pluck('id')->toArray();
            $new_tag_name_array = array_diff($request_tag_array, $exist_tag_name_array);

            // create new tags
            if (!empty($new_tag_name_array)) {
                foreach ($new_tag_name_array as $new_tag_name) {
                    $tag->create([
                        'name' => $new_tag_name
                    ]);
                }

                $new_tag_id_array = $tag->whereIn('name', $new_tag_name_array)->get()->pluck('id')->toArray();
                $tag_id_array = array_merge($exist_tag_id_array, $new_tag_id_array);
            } else {
                $tag_id_array = $exist_tag_id_array;
            }
        } else {
            $tag_id_array = [];
        }

        $post->tags()->sync($tag_id_array);

        return ["id" => $post->id];
    }

    /**
     * Update publication status of post
     *
	 * @param  int  $id
     * @param  object  $request
     * @return void
     */
    public function update($request, $id)
    {
        $post = $this->post->find($id);

        $post->status = $request->status;

        if ($post->status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        return ["id" => $post->id];
    }

    /**
     * Delete a post
     *
     * @return void
     */
    public function delete($id)
    {
        $post = $this->post->find($id);
        $post->tags()->detach();

        $post->delete(); // TODO

        return [];
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
