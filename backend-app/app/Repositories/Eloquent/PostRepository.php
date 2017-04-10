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

        // $post->admin_id = (int) $request->admin_id; // FIXME set authenticated admin id
        $post->admin_id = (int) 1;
        $post->category_id = (int) $request->category_id;
        $post->title = (string) $request->title;
        $post->content = (string) $request->content;
        $post->thumb_img_path = (string) $request->thumb_img_path;
        $post->publication_status = (string) $request->publication_status;

        if ($request->publication_status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        $tag_id_array = [];

        // HACK
        if ($request->tags) {
            $request_tag_array = [];

            foreach ($request->tags as $request_tag) {
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
            $post->tags()->sync($tag_id_array);
        } else {
            $post->tags()->sync($request->tags);
        }

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

        // $post->admin_id = (int) $request->admin_id; // FIXME set authenticated admin id
        $post->admin_id = (int) 1;
        $post->category_id = (int) $request->category_id;
        $post->title = (string) $request->title;
        $post->content = (string) $request->content;
        $post->thumb_img_path = (string) $request->thumb_img_path;
        $post->publication_status = (string) $request->publication_status;

        if ($request->publication_status == 'public') {
            $post->publication_date = Carbon::now();
        }

        $post->save();

        $tag = $this->tag;

        // HACK
        if ($request->tags) {
            $request_tag_array = [];

            foreach ($request->tags as $request_tag) {
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
            $post->tags()->sync($tag_id_array);
        } else {
            $post->tags()->sync($request->tags);
        }

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
     * @param int $id
     *
     * @return array $post_array
     */
    public function getPost(int $id)
    {
        $post = $this->post->with('admin', 'category', 'comments', 'tags')->find($id);

        return $post;
    }

    /**
     * Get posts.
     *
     * @return array $post_array
     */
    public function getPosts()
    {
        $posts = $this->post->with('admin', 'category', 'comments', 'tags')->paginate(self::POST_PAGINATE_NUM);

        return $posts;
    }
}
