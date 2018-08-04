<?php

namespace Rubel\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Category;

interface CategoryRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Category
     */
    public function store(array $attributes): Category;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Category
     */
    public function findById(int $id): Category;

    /**
     * Update the specified resouce in storage.
     *
     * @param  array $attributes
     * @param  int    $id
     * @return Category
     */
    public function updateById(array $attributes, int $id): Category;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return void
     */
    public function destroyById(int $id): void;
}
