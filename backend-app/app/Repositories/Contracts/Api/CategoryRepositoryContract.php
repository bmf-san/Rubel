<?php

namespace App\Repositories\Contracts\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

interface CategoryRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection;

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
     * @return Category
     */
    public function show(int $id): Category;

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int    $id
     * @return array
     */
    public function update($request, int $id): array;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return array
     */
    public function destroy(int $id): array;
}
