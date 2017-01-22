<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// TODO: 正規表現

Route::group(['middleware' => 'guest'], function () {
    Route::get('post/{id}', 'Api\v1\Post\Postcontroller@getPost')->where('id', '[0-9]+');;
    Route::get('posts', 'Api\v1\Post\PostController@getPosts');
	Route::get('tags', 'Api\v1\Tag\TagController@getTags');
	Route::get('categories', 'Api\v1\Category\CategoryController@getCategories');
});

Route::group(['middleware' => 'api:admins', 'prefix' => 'admin'], function () {
	Route::post('post/create', 'Api\v1\Post\PostController@create');
	Route::post('post/{id}/edit', 'Api\v1\Post\PostController@edit')->where('id', '[0-9]+');;
	Route::post('post/{id}/update', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');;
	Route::post('post/{id}/delete', 'Api\v1\Post\PostController@delete')->where('id', '[0-9]+');;
	Route::get('tag/create', 'Api\v1\Tag\TagController@create');
	Route::get('tag/{id}/edit', 'Api\v1\Tag\TagController@edit')->where('id', '[0-9]+');;
	Route::get('tag/{id}/delete', 'Api\v1\Tag\TagController@delete')->where('id', '[0-9]+');;
	Route::get('category/create', 'Api\v1\Category\CategoryController@create');
	Route::get('category/{id}/edit', 'Api\v1\Category\CategoryController@edit')->where('id', '[0-9]+');;
	Route::get('category/{id}/delete', 'Api\v1\Category\CategoryController@delete')->where('id', '[0-9]+');;
});
