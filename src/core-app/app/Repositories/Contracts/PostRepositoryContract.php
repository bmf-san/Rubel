<?php

namespace Rubel\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Rubel\Repositories\Eloquent\PostRepository;
use Rubel\Models\Post;

interface PostRepositoryContract
{
    /**
     * Wrap an eloquent with method.
     *
     * @param  string $relations
     * @return PostRepository
     */
    public function setWith(string $relations): PostRepository;

    /**
     * Display a listing of the resource.
     *
     * @param int $paginationLimit
     * @return mixed
     */
    public function findAll(int $paginationLimit = null);

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
     * Display the specified resource.
     *
     * @param int $id
     * @param int $paginationLimit
     * @return mixed
     */
    public function findAllByCategoryName(string $name, int $paginationLimit = null);

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