<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Post.
 */
Route::get('posts', 'Api\v1\PostController@index');
Route::get('posts/{id}', 'Api\v1\PostController@show')->where('id', '[0-9]+');

/*
 * Category
 */
Route::get('categories', 'Api\v1\CategoryController@index');
Route::get('categories/{id}', 'Api\v1\CategoryController@show')->where('id', '[0-9]+');

/*
* Tag
*/
Route::get('tags', 'Api\v1\TagController@index');
Route::get('tags/{id}', 'Api\v1\TagController@show')->where('id', '[0-9]+');

/**
 * Config
 */
Route::get('configs', 'Api\v1\ConfigController@index');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

/*
 * Post
 */
Route::post('posts', 'Api\v1\PostController@store');
Route::patch('posts/{id}', 'Api\v1\PostController@update')->where('id', '[0-9]+');
Route::delete('posts/{id}', 'Api\v1\PostController@destroy')->where('id', '[0-9]+');

/*
* Category
*/
Route::post('categories', 'Api\v1\CategoryController@store');
Route::patch('categories/{id}', 'Api\v1\CategoryController@update')->where('id', '[0-9]+');
Route::delete('categories/{id}', 'Api\v1\CategoryController@destroy')->where('id', '[0-9]+');

/*
 * Tag
 */
Route::post('tags', 'Api\v1\TagController@store');
Route::patch('tags/{id}', 'Api\v1\TagController@update')->where('id', '[0-9]+');
Route::delete('tags/{id}', 'Api\v1\TagController@destroy')->where('id', '[0-9]+');

/**
 * Config
 */
Route::patch('configs', 'Api\v1\ConfigController@update');
