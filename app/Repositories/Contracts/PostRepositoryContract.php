<?php

namespace App\Repositories\Contracts;

interface PostRepositoryContract
{
    /**
     * Create a new post
     */
    public function create();

    /**
     * Edit a post
     */
    public function edit();

    /**
     * Update publication status of post
     */
    public function update();

    /**
     * Delete a post
     */
    public function delete();

    /**
     * Get a single post
     */
    public function getPost($id);

    /**
     * Get posts
     */
    public function getPosts();
}
