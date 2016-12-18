<?php

namespace App\Repositories\Contracts;

interface PostRepositoryContract
{
    /**
     * Create a new post
     */
    public function createPost();

    /**
     * Edit a post
     */
    public function editPost();

    /**
     * Delete a post
     */
    public function deletePost();

    /**
     * Get a single post
     */
    public function getPost($id);

    /**
     * Get posts
     */
    public function getPosts();
}
