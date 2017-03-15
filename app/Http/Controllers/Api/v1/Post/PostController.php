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
    public function create(Request $request) // TODO add form request for creating a post
    {
        return response()->json($this->post_repository->create($request));
    }

    /**
     * Edit a post
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id) // TODO add form request for editting a post
    {
        return response()->json($this->post_repository->edit($request, $id));
    }

    /**
    * Update publication status of post
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, int $id) // TODO add form request for update this status
    {
        return response()->json($this->post_repository->update($request, $id));
    }

    /**
     * Delete a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        return response()->json($this->post_repository->delete($id));
    }

    /**
     * Show a single post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPost(Int $id)
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
