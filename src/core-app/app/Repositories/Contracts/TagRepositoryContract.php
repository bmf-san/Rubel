<?php

namespace Rubel\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Tag;

interface TagRepositoryContract
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
     * @return Tag
     */
    public function store(array $attributes): Tag;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Tag
     */
    public function findById(int $id): Tag;

    /**
     * Update the specified resource in storage.
     *
     * @param  array $attributes
     * @param  Int    $id
     * @return Tag
     */
    public function updateById(array $attributes, Int $id): Tag;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return void
     */
    public function destroyById(Int $id): void;
}
