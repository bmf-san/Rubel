<?php

namespace App\Repositories\Contracts;

interface PostRepositoryContract
{
    /**
     * Create a new post
     * @return [type] [description]
     */
    public function createPost();

    /**
     * Edit a post
     * @return [type] [description]
     */
    public function editPost();

    /**
     * Delete a post
     * @return [type] [description]
     */
    public function deletePost();

    /**
     * Get a single post
     * @return [type] [description]
     */
    public function getPost($id);

    /**
     * Get posts
     * @return [type] [description]
     */
    public function getPosts();
}
