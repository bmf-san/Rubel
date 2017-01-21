<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('post/{id}', 'Api\v1\Post\Postcontroller@getPost');
    Route::get('posts', 'Api\v1\Post\PostController@getPosts');
	Route::get('tags', 'Api\v1\Tag\TagController@getTags');
	Route::get('categories', 'Api\v1\Category\CategoryController@getCategories');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
	Route::post('post/create', 'Api\v1\Post\PostController@create');
	Route::post('post/{id}/edit', 'Api\v1\Post\PostController@edit');
	Route::post('post/{id}/update', 'Api\v1\Post\PostController@update');
	Route::post('post/{id}/delete', 'Api\v1\Post\PostController@delete');
	Route::get('tag/create', 'Api\v1\Tag\TagController@create');
	Route::get('tag/{id}/edit', 'Api\v1\Tag\TagController@edit');
	Route::get('tag/{id}/delete', 'Api\v1\Tag\TagController@delete');
	Route::get('category/create', 'Api\v1\Category\CategoryController@create');
	Route::get('category/{id}/edit', 'Api\v1\Category\CategoryController@edit');
	Route::get('category/{id}/delete', 'Api\v1\Category\CategoryController@delete');
});
