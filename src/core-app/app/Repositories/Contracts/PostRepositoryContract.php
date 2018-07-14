<?php

namespace Rubel\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Models\Post;

interface PostRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAll(): LengthAwarePaginator;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Post
     */
    public function store(array $attributes): Post;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Post
     */
    public function findById(int $id): Post;

    /**
     * Update the specified resouce in storage.
     *
     * @param int    $id
     * @param array $attributes
     * @return Post
     */
    public function updateById(array $attributes, int $id): Post;

    /**
     * Remove the specified resouce from storage.
     *
     * @return void
     */
    public function destroyById(int $id): void;
}
