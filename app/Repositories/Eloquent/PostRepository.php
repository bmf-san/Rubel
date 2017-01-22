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
     * @param  object  $request
     * @return void
     */
    public function create($request)
    {
		dd($request); //TODO:　デバッグ中
        $post = $this->post->create([  // TODO modify values in this array
                    "admin" => [
                        "name" => 'test'
                    ],
                    "category" => [
                        "name" => ''
                    ],
                    "tag" => '',  // idを持っていないやつだけタグを新規登録
                    "title" => '',
                    "content" => '',
                    "thumb_img_path" => '', // default
                    "status" => '',
                    "publication_date" => '',
                ]);
    }

    /**
     * Edit a post
     *
     * @param  int  $id
 	 * @param  object  $request
     * @return void
     */
    public function edit($id, $request)
    {
        $post = $this->post->find($id)->update([ // TODO modify values in this array
                    "admin" => [
                        "id" => '',
                        "name" => ''
                    ],
                    "category" => [
                        "id" => '',
                        "name" => ''
                    ],
                    "tag" => '',
                    "title" => '',
                    "content" => '',
                    "thumb_img_path" => '',
                    "status" => '',
                    "publication_date" => '',
                ]);
    }

    /**
     * Update publication status of post
     *
	 * @param  int  $id
     * @param  object  $request
     * @return void
     */
    public function update($id, $request)
    {
        $post = $this->post->find($id)->update([ // TODO modify values in this array
                    "status" => '',
                ]);
    }

    /**
     * Delete a post
     *
     * @return void
     */
    public function delete($id)
    {
        $post = $this->post->find($id)->delete();
    }

    /**
     * Get a single post
     *
     * @param  int  $id
     * @return object
     */
     public function getPost($id)
     {
        $post = $this->post->with(['admin' => function ($query) {
			$query->select('id', 'name');
		}], 'category', 'comments', 'tags')->find($id);

		return $post;
	}

    /**
     * Get posts
     *
     * @return object
     */
     public function getPosts()
     {
        $posts = $this->post->with(['admin' => function ($query) {
			$query->select('id', 'name');
		}], 'category', 'comments', 'tags')->get();

        return $posts;
     }
}
