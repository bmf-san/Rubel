<?php

namespace App\Repositories\Contracts;

interface TagRepositoryContract
{
    /**
     * Display a listing of the resource.
     *
     * @return [type] [description]
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     *
     * @param [type] $request [description]
     *
     * @return [type] [description]
     */
    public function store($request);

    /**
     * Display the specified resource.
     *
     * @param int $id [description]
     *
     * @return [type] [description]
     */
    public function show(int $id);

    /**
     * Update the specified resource in storage.
     *
     * @param int                      $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update($request, Int $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id);
}
