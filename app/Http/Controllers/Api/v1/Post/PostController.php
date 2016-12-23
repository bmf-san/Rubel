<?php

namespace App\Http\Controllers\Api\v1\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PostRepository;

class PostController extends Controller
{
    private $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    /**
     * Create a new post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()->json($this->post_repository())->create($request);
    }

    /**
     * Edit a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json($this->post_repository())->edit($id);
    }

    /**
    * Update publication status of post
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        return response()->json($this->post_repository())->update($request, $id);
    }

    /**
     * Delete a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return response()->json($this->post_repository())->delete($id);
    }

    /**
     * Show a single post
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($id)
    {
        return response()->json($this->post_repository->getPost($id));
    }

    /**
     * Show posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {
        return response()->json($this->post_repository->getPosts());
    }
}
