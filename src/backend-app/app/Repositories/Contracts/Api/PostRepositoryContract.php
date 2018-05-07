<?php

namespace Rubel\Repositories\Contracts\Api;

use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Models\Post;

interface PostRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store($request): array;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Post
     */
    public function show(int $id): Post;

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param object $request
     * @return array
     */
    public function update($request, int $id): array;

    /**
     * Remove the specified resouce from storage.
     *
     * @return array
     */
    public function destroy(int $id): array;
}
