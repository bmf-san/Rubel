<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryContract
{
	/**
	 * Create a new category
	 *
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
	 */
	public function create($request);

	/**
	 * Edit a category
	 *
	 * @param  int  $id
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
	 */
	public function edit($id, $request);

	/**
	 * Delete a category
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id);

	/**
	 * Get categories
	 *
 	 * @return \Illuminate\Http\Response
 	 * */
	public function getCategories();
}
