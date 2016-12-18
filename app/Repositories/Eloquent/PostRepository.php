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
         return $this->post->with('admin', 'postImages', 'category', 'comments', 'tags')->find($id);
     }

    /**
     * Get posts
     *
     * @param  string  $id
     * @return object
     */
     public function getPosts()
     {
         return $this->post->with('admin', 'postImages', 'category', 'comments', 'tags')->get(); // FIXME comments is unnecessary maybe...
     }
}
