<?php

namespace App\Repositories\Eloquent\Api;

use App\Repositories\Contracts\Api\PostRepositoryContract;
use App\Models\Post;
use App\Models\Tag;

class PostRepository implements PostRepositoryContract
{
    const POST_PAGINATE_NUM = 10;

    private $post;
    private $tag;

    public function __construct(Post $post, Tag $tag)
    {
        $this->post = $post;
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array $posts
     */
    public function index()
    {
        $posts = $this->post->with('admin', 'category', 'comments', 'tags')->paginate(self::POST_PAGINATE_NUM);

        return $posts;
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
        $post = $this->post;
        $post = $this->savePost($post, $request);

        $tag = $this->tag;
        $this->syncTags($post, $tag, $request->tags);

        return ['id' => $post->id];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return array $post
     */
    public function show(int $id)
    {
        $post = $this->post->with('admin', 'category', 'comments', 'tags')->find($id);

        return $post;
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
        $post = $this->post->findOrFail($id);

        $post->update($request->all());

        $tag = $this->tag;
        $this->syncTags($post, $tag, $request->tags);

        return ['id' => $post->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(Int $id)
    {
        $post = $this->post->find($id);

        $post->delete();

        return [];
    }

    /**
     * Save post.
     *
     * @param Post   $post
     * @param Object $request
     *
     * @return int $post
     */
    private function savePost(Post $post, $request)
    {
        $post = $post->create([
            'admin_id' => (int) 1, // FIXME set authenticated admin id
            'category_id' => (int) $request->category_id,
            'title' => (string) $request->title,
            'content' => (string) $request->content,
            'thumb_img_path' => (string) $request->thumb_img_path,
            'publication_status' => (string) $request->publication_status,
        ]);

        return $post;
    }

    /**
     * Sync tags.
     *
     * @param Post  $post
     * @param Tag   $tag
     * @param Array $tags
     */
    private function syncTags(Post $post, Tag $tag, $tags)
    {
        // HACK
        if ($tags) {
            $request_tag_array = [];

            foreach ($tags as $request_tag) {
                $request_tag_array[] = $request_tag['name'];
            }

            $exist_tag_collection = $tag->whereIn('name', $request_tag_array)->get();

            $exist_tag_name_array = $exist_tag_collection->pluck('name')->toArray();
            $exist_tag_id_array = $exist_tag_collection->pluck('id')->toArray();

            $new_tag_name_array = array_diff($request_tag_array, $exist_tag_name_array);

            $tag_id_array = [];

            if ($new_tag_name_array) {
                // Create new tags if there are new tags which has not been registerd.
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
            $post->tags()->sync($tags);
        }
    }
}
