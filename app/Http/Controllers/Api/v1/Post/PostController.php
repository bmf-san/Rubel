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
     * Show a single post
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($id)
    {
        $post = $this->post_repository->getPost($id);

        $post_ary = [
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
            "deleted_at" => null,
            "comment" => $post->comments
        ];

        return response()->json($post_ary);
    }

    /**
     * Show posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {
        $posts = $this->post_repository->getPosts();

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

        return response()->json($posts_ary);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
