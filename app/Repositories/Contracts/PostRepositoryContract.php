<?php

namespace App\Repositories\Contracts;

interface PostRepositoryContract
{
    /**
     * Create a new post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($request);

    /**
     * Edit a post
     *
     * @param  int  $id
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $request);

    /**
     * Update publication status of post
     *
	 * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, $request);

    /**
     * Delete a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id);

    /**
     * Get a single post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPost($id);

    /**
     * Get posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts();
}
