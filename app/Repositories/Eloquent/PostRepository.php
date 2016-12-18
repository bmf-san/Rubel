<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Create a new post
     * @return [type] [description]
     */
    public function createPost()
    {

    }

    /**
     * Edit a post
     * @return [type] [description]
     */
    public function editPost()
    {

    }

    /**
     * Delete a post
     * @return [type] [description]
     */
    public function deletePost()
    {

    }

    /**
     * Get a single post
     * @return [type] [description]
     */
    public function getPost()
    {

    }

    /**
     * Get posts
     * @return [type] [description]
     */
    public function getPosts()
    {

    }
}
