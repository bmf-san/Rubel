<?php

namespace App\Repositories\Contracts\Api;

use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryContract
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function show(int $id): Collection;

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Int    $id
     * @return array
     */
    public function update($request, Int $id): array;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int   $id
     * @return array
     */
    public function destroy(Int $id): array;
}
