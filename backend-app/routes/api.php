<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Post.
 */
Route::get('posts', 'PostController@index');
Route::get('posts/{id}', 'PostController@show')->where('id', '[0-9]+');

/*
 * Category
 */
Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show')->where('id', '[0-9]+');

/*
* Tag
*/
Route::get('tags', 'TagController@index');
Route::get('tags/{id}', 'TagController@show')->where('id', '[0-9]+');

/**
 * Config
 */
Route::get('configs', 'ConfigController@index');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

/*
 * Post
 */
Route::post('posts', 'PostController@store');
Route::patch('posts/{id}', 'PostController@update')->where('id', '[0-9]+');
Route::delete('posts/{id}', 'PostController@destroy')->where('id', '[0-9]+');

/*
* Category
*/
Route::post('categories', 'CategoryController@store');
Route::patch('categories/{id}', 'CategoryController@update')->where('id', '[0-9]+');
Route::delete('categories/{id}', 'CategoryController@destroy')->where('id', '[0-9]+');

/*
 * Tag
 */
Route::post('tags', 'TagController@store');
Route::patch('tags/{id}', 'TagController@update')->where('id', '[0-9]+');
Route::delete('tags/{id}', 'TagController@destroy')->where('id', '[0-9]+');

/**
 * Config
 */
Route::patch('configs', 'ConfigController@update');
