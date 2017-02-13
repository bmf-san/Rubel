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
        $data = $this->post_repository->create($request);

        if ($data) {
            return response()->json($this->post_repository->create($request));
        } else {
            return $response()->json(['status' => 'Not Found']);
        }
    }

    /**
     * Edit a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // TODO add form request for editting a post
    {
        $data = $this->post_repository->edit($id);

        if ($data) {
            return response()->json($this->post_repository->edit($id));
        } else {
            return response()->json(['status' => 'Not Found']);
        }
    }

    /**
    * Update publication status of post
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) // TODO add form request for update this status
    {
        $data = $this->post_repository->update($request, $id);

        if ($data) {
            return response()->json($this->post_repository->update($request, $id));
        } else {
            return response()->json(['status' => 'Not Found']);
        }
    }

    /**
     * Delete a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = $this->post_repository->delete($id);

        if ($data) {
            return response()->json($this->post_repository->delete($id));
        } else {
            return response()->json(['status' => 'Not Found']);
        }
    }

    /**
     * Show a single post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPost($id)
    {
        $data = $this->post_repository->getPost($id);

        if ($data) {
            return response()->json($this->post_repository->getPost($id));
        } else {
            return response()->json(['status' => 'Not Found']);
        }
    }

    /**
     * Show posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {
        $data = $this->post_repository->getPosts();

        if ($data) {
            return response()->json($this->post_repository->getPosts());
        } else {
            return response()->json(['status' => 'Not Found']);
        }
    }
}
