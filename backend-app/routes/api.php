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
    Route::post('post', 'Api\v1\Post\PostController@create');
    Route::patch('post/{id}', 'Api\v1\Post\PostController@edit')->where('id', '[0-9]+');
    Route::patch('post/{id}/publication-status', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');
    Route::delete('post/{id}', 'Api\v1\Post\PostController@delete')->where('id', '[0-9]+');
    Route::patch('tag/{id}', 'Api\v1\Tag\TagController@edit')->where('id', '[0-9]+');
    Route::delete('tag/{id}', 'Api\v1\Tag\TagController@delete')->where('id', '[0-9]+');
    Route::post('category', 'Api\v1\Category\CategoryController@create');
    Route::patch('category/{id}', 'Api\v1\Category\CategoryController@edit')->where('id', '[0-9]+');
    Route::delete('category/{id}', 'Api\v1\Category\CategoryController@delete')->where('id', '[0-9]+');
});
