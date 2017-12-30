<?php

namespace Rubel\Repositories\Contracts\Api;

use Illuminate\Database\Eloquent\Collection;

interface ConfigRepositoryContract
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection;

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function update($request): array;
}
