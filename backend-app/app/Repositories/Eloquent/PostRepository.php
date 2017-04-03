<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryContract;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostRepository implements PostRepositoryContract
{
    const POST_PAGINATE_NUM = 10;

    public $post, $tag;

    public function __construct(Post $post,
                                Tag $tag
                                ) {
        $this->post = $post;
        $this->tag = $tag;
    }

    /**
     * Create a new post.
     *
     * @param object $request
     *
     * @return array
     */
    public function create($request)
    {
        $post = $this->post;

        // $post->admin_id = $request->user()->id;
        $post->admin_id = $request->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumb_img_path = $request->thumb_img_path;
        $post->publication_status = $request->publication_status;

        if ($request->publication_status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        $tag_id_array = [];

        // HACK
        if ($request->tag) {
            $request_tag_array = [];

            foreach ($request->tag as $request_tag) {
                $request_tag_array[] = $request_tag['name'];
            }

            $exist_tag_collection = $tag->whereIn('name', $request_tag_array)->get();

            $exist_tag_name_array = $exist_tag_collection->pluck('name')->toArray();
            $exist_tag_id_array = $exist_tag_collection->pluck('id')->toArray();

            $new_tag_name_array = array_diff($request_tag_array, $exist_tag_name_array);

            if ($new_tag_name_array) {
                foreach ($new_tag_name_array as $new_tag_name) {
                    $tag->create([
                        'name' => $new_tag_name,
                    ]);
                }

                $new_tag_id_array = $tag->whereIn('name', $new_tag_name_array)->get()->pluck('id')->toArray();

                $tag_id_array = array_merge($exist_tag_id_array, $new_tag_id_array);
            } else {
                $tag_id_array = $exist_tag_id_array;
            }
        }

        $post->tags()->sync($tag_id_array);

        return ['id' => $post->id];
    }

    /**
     * Edit a post.
     *
     * @param int    $id
     * @param object $request
     *
     * @return array
     */
    public function edit($request, int $id)
    {
        $post = $this->post->find($id);

        $post->admin_id = $request->admin_id;  // FIXME change this value to Authentication info -> admin_id
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumb_img_path = $request->thumb_img_path;
        $post->publication_status = $request->publication_status;

        if ($request->publication_status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        // HACK
        if ($request->tag) {
            $request_tag_array = [];

            foreach ($request->tag as $request_tag) {
                $request_tag_array[] = $request_tag['name'];
            }

            $exist_tag_collection = $tag->whereIn('name', $request_tag_array)->get();

            $exist_tag_name_array = $exist_tag_collection->pluck('name')->toArray();
            $exist_tag_id_array = $exist_tag_collection->pluck('id')->toArray();

            $new_tag_name_array = array_diff($request_tag_array, $exist_tag_name_array);

            if ($new_tag_name_array) {
                foreach ($new_tag_name_array as $new_tag_name) {
                    $tag->create([
                        'name' => $new_tag_name,
                    ]);
                }

                $new_tag_id_array = $tag->whereIn('name', $new_tag_name_array)->get()->pluck('id')->toArray();

                $tag_id_array = array_merge($exist_tag_id_array, $new_tag_id_array);
            } else {
                $tag_id_array = $exist_tag_id_array;
            }
        }

        $post->tags()->sync($tag_id_array);

        return ['id' => $post->id];
    }

    /**
     * Update publication status of post.
     *
     * @param int    $id
     * @param object $request
     *
     * @return array
     */
    public function update($request, Int $id)
    {
        $post = $this->post->find($id);

        $post->publication_status = $request->publication_status;

        if ($post->publication_status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        return ['id' => $post->id];
    }

    /**
     * Delete a post.
     *
     * @return array
     */
    public function delete(Int $id)
    {
        $post = $this->post->find($id);

        $post->delete();

        return [];
    }

     /**
      * Get a single post.
      *
      * @param  int  $id
      *
      * @return array  $post_array
      */
     public function getPost(int $id)
     {
         $post = $this->post->with('admin', 'category', 'comments', 'tags')->find($id);

         $post_array = [
            'admin' => $post->admin,
            'category' => $post->category,
            'title' => $post->title,
            'content' => $post->content,
            'thumb_img_path' => $post->thumb_img_path,
            'publication_status' => $post->publication_status,
            'tags' => $post->tags,
            'publication_date' => $post->publication_date->format('Y-m-d H:i:s'),
        ];

         return $post_array;
     }

     /**
      * Get posts.
      *
      * @return array  $post_array
      */
     public function getPosts()
     {
         $posts = $this->post->with('admin', 'category', 'comments', 'tags')->paginate(self::POST_PAGINATE_NUM);

         $post_array = [];

         foreach ($posts as $post) {
             $post_array[] = [
                 'id' => $post->id,
                 'admin' => $post->admin,
                 'category' => $post->category,
                 'title' => $post->title,
                 'content' => $post->content,
                 'thumb_img_path' => $post->thumb_img_path,
                 'publication_status' => $post->publication_status,
                 'tags' => $post->tags,
                 'publication_date' => $post->publication_date->format('Y-m-d H:i:s'),
             ];
         }

         return $post_array;
     }
}
