<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'guest'], function () {
    Route::post('post/create', 'Api\v1\Post\PostController@create');
    Route::post('post/{id}/edit', 'Api\v1\Post\PostController@edit');
    Route::post('post/{id}/update', 'Api\v1\Post\PostController@update');
    Route::post('post/{id}/delete', 'Api\v1\Post\PostController@delete');
    Route::get('post/{id}', 'Api\v1\Post\Postcontroller@getPost');
    Route::get('posts', 'Api\v1\Post\PostController@getPosts');
});
