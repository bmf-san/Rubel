<?php

namespace App\Repositories\Contracts\Api;

use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store($request);

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Post
     */
    public function show(int $id);

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param object $request
     *
     * @return array
     */
    public function update($request, int $id);

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(int $id);
}
