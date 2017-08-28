<?php

namespace App\Repositories\Contracts\Api;

interface ConfigRepositoryContract
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index();

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function update($request);
}
