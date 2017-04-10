<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('post/{id}', 'Api\v1\Post\Postcontroller@getPost')->where('id', '[0-9]+');
Route::get('posts', 'Api\v1\Post\PostController@getPosts');
Route::get('tags', 'Api\v1\Tag\TagController@getTags');
Route::get('categories', 'Api\v1\Category\CategoryController@getCategories');

Route::group(['prefix' => 'admin'], function () {  // TODO: Add authentication
    Route::post('post/create', 'Api\v1\Post\PostController@create');
    Route::patch('post/{id}/edit', 'Api\v1\Post\PostController@edit')->where('id', '[0-9]+');
    Route::patch('post/{id}/update', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');
    Route::delete('post/{id}/delete', 'Api\v1\Post\PostController@delete')->where('id', '[0-9]+');
    Route::patch('tag/{id}/edit', 'Api\v1\Tag\TagController@edit')->where('id', '[0-9]+');
    Route::delete('tag/{id}/delete', 'Api\v1\Tag\TagController@delete')->where('id', '[0-9]+');
    Route::post('category/create', 'Api\v1\Category\CategoryController@create');
    Route::patch('category/{id}/edit', 'Api\v1\Category\CategoryController@edit')->where('id', '[0-9]+');
    Route::delete('category/{id}/delete', 'Api\v1\Category\CategoryController@delete')->where('id', '[0-9]+');
});
