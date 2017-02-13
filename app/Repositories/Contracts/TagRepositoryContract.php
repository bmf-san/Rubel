<?php

namespace App\Repositories\Contracts;

interface TagRepositoryContract
{
	/**
	 * Edit a tag
	 *
	 * @param  int  $id
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
	 */
	public function edit($id, $request);


	/**
	 * Delete a tag
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id);

	/**
	 * Get tags
	 *
 	 * @return \Illuminate\Http\Response
 	 * */
	public function getTags();
}
