<?php

namespace Rubel\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Config;

interface ConfigRepositoryContract
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection;

    /**
     * Update the specified resouce in storage.
     *
     * @param  array $attributes
     * @return Collection
     */
    public function update(array $attributes): Collection;
}
