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
    public function edit($request, int $id);

    /**
     * Update publication status of post
     *
	 * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($request, int $id);

    /**
     * Delete a post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id);

    /**
     * Get a single post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPost(int $id);

    /**
     * Get posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts();
}
