<?php

namespace App\Repositories\Eloquent\Api;

use App\Repositories\Contracts\Api\PostRepositoryContract;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostRepository implements PostRepositoryContract
{
    const PAGINATION_LIMIT = 10;

    private $post_model;
    private $tag_model;

    public function __construct(Post $post_model, Tag $tag_model)
    {
        $this->post_model = $post_model;
        $this->tag_model = $tag_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array $posts
     */
    public function index()
    {
        $posts = $this->post_model->with('admin', 'category', 'comments', 'tags')->paginate(self::PAGINATION_LIMIT);

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
        $post = $this->post_model;
        $post = $this->savePost($post, $request);

        $tag = $this->tag_model;
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
        $post = $this->post_model->with('admin', 'category', 'comments', 'tags')->find($id);

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
        $post = $this->post_model->findOrFail($id);

        $this->updatePost($post, $request);

        if ($request->tags) {
            $tag = $this->tag_model;
            $this->syncTags($post, $tag, $request->tags);
        }

        return ['id' => $post->id];
    }

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(Int $id)
    {
        $post = $this->post_model->find($id);

        $post->delete();

        return [];
    }

    /**
     * Save post.
     *
     * @param Post   $post
     * @param \Illuminate\Http\Request $request
     *
     * @return int $post
     */
    private function savePost(Post $post, $request)
    {
        $publication_date = null;

        if ($request->publication_status == 'public') {
            $publication_date = Carbon::now();
        }

        $post = $post->create([
            'admin_id' => (int) 1, // FIXME set authenticated admin id
            'category_id' => (int) $request->category_id,
            'title' => (string) $request->title,
            'md_content' => (string) $request->md_content,
            'html_content' => (string) $request->html_content,
            'publication_status' => (string) $request->publication_status,
            'publication_date' => $publication_date
        ]);

        return $post;
    }

    /**
     * Update post.
     *
     * @param Post   $post
     * @param \Illuminate\Http\Request $request
     */
    public function updatePost(Post $post, $request)
    {
        $publication_date = $post->publication_date;

        if ($request->publication_status == 'public') {
            if (is_null($publication_date)) {
                $publication_date = Carbon::now();
            }
        }

        $post->update([
            'admin_id' => (int) 1, // FIXME set authenticated admin id
            'category_id' => (int) $request->category_id,
            'title' => (string) $request->title,
            'md_content' => (string) $request->md_content,
            'html_content' => (string) $request->html_content,
            'publication_status' => (string) $request->publication_status,
            'publication_date' => $publication_date
        ]);
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
