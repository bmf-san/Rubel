<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('posts', 'Api\v1\Post\PostController@index');
Route::get('post/{id}', 'Api\v1\Post\Postcontroller@show')->where('id', '[0-9]+');
Route::get('tags', 'Api\v1\Tag\TagController@index');
Route::get('categories', 'Api\v1\Category\CategoryController@index');

Route::group(['prefix' => 'admin'], function () {  // TODO: Add authentication
    Route::post('post', 'Api\v1\Post\PostController@store');
    Route::patch('post/{id}', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');
    Route::delete('post/{id}', 'Api\v1\Post\PostController@delete')->where('id', '[0-9]+');
    Route::patch('tag/{id}', 'Api\v1\Tag\TagController@update')->where('id', '[0-9]+');
    Route::delete('tag/{id}', 'Api\v1\Tag\TagController@delete')->where('id', '[0-9]+');
    Route::post('category', 'Api\v1\Category\CategoryController@store');
    Route::patch('category/{id}', 'Api\v1\Category\CategoryController@update')->where('id', '[0-9]+');
    Route::delete('category/{id}', 'Api\v1\Category\CategoryController@delete')->where('id', '[0-9]+');
});
