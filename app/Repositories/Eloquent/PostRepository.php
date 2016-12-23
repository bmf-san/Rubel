<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryContract;
use App\Models\Post;

class PostRepository implements PostRepositoryContract
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Create a new post
     *
     * @return [type] [description]
     */
    public function create($request)
    {

    }

    /**
     * Edit a post
     *
     * @return [type] [description]
     */
    public function edit()
    {

    }

    /**
     * Update publication status of post
     *
     * @return [type] [description]
     */
    public function update()
    {

    }

    /**
     * Delete a post
     *
     * @return [type] [description]
     */
    public function delete()
    {

    }

    /**
     * Get a single post
     *
     * @return object
     */
     public function getPost($id)
     {
        $post = $this->post->with('admin', 'postImages', 'category', 'comments', 'tags')->find($id);

        return [
            "id" => $post->id,
            "admin" => [
                "id" => $post->admin->id,
                "name" => $post->admin->name
            ],
            "category" => [
                "id" => $post->category->id,
                "name" => $post->category->name
            ],
            "tag" => $post->tags,
            "title" => $post->title,
            "content" => $post->content,
            "thumb_img_path" => $post->thumb_img_path,
            "views" => $post->views,
            "status" => $post->status,
            "publication_date" => $post->publication_date,
            "created_at" => $post->create_at,
            "updated_at" => $post->updated_at,
            "deleted_at" => $post->deleted_at,
            "comment" => $post->comments
        ];
     }

    /**
     * Get posts
     *
     * @param  string  $id
     * @return object
     */
     public function getPosts()
     {
        $posts = $this->post->with('admin', 'postImages', 'category', 'comments', 'tags')->get();

        $posts_ary = [];

        foreach ($posts as $post) {
            $posts_ary[]= [
                "id" => $post->id,
                "admin_id" => $post->admin_id,
                "category" => [
                    "id" => $post->category->id,
                    "name" => $post->category->name
                ],
                "tag" => $post->tags,
                "title" => $post->title,
                "content" => $post->content,
                "thumb_img_path" => $post->thumb_img_path,
                "views" => $post->views,
                "status" => $post->status,
                "publication_date" => $post->publication_date,
                "created_at" => $post->create_at,
                "updated_at" => $post->updated_at,
                "deleted_at" => $post->deleted_at,
            ];
        }

        return $posts_ary;
     }
}
