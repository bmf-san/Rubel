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
    public function createPost()
    {

    }

    /**
     * Edit a post
     *
     * @return [type] [description]
     */
    public function editPost()
    {

    }

    /**
     * Delete a post
     *
     * @return [type] [description]
     */
    public function deletePost()
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
            "post_images" => $post->postImages,
            "title" => "Title-1",
            "content" => "This is 1 content.",
            "thumb_img_path" => "http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg",
            "views" => 0,
            "status" => "draft",
            "publication_date" => "2016-12-11 15:04:27",
            "created_at" => "2016-12-11 15:04:27",
            "updated_at" => null,
            "deleted_at" => null,
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
                "title" => "Title-1",
                "content" => "This is 1 content.",
                "thumb_img_path" => "http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg",
                "views" => 0,
                "status" => "draft",
                "publication_date" => "2016-12-11 15:04:27",
                "created_at" => "2016-12-11 15:04:27",
                "updated_at" => null,
                "deleted_at" => null
            ];
        }

        return $posts_ary;
     }
}
