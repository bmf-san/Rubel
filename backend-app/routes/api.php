<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Post.
 */
Route::get('posts', 'Api\v1\Post\PostController@index');
Route::get('posts/{id}', 'Api\v1\Post\Postcontroller@show')->where('id', '[0-9]+');

/*
 * Tag
 */
Route::get('tags', 'Api\v1\Tag\TagController@index');
Route::get('tags/{id}', 'Api\v1\Tag\TagController@show')->where('id', '[0-9]+');

/*
 * Category
 */
Route::get('categories', 'Api\v1\Category\CategoryController@index');
Route::get('categories/{id}', 'Api\v1\Category\CategoryController@show')->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

/*
 * Post
 */
Route::post('posts', 'Api\v1\Post\PostController@store');
Route::patch('posts/{id}', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');
Route::delete('posts/{id}', 'Api\v1\Post\PostController@destroy')->where('id', '[0-9]+');

/*
 * Tag
 */
Route::post('tags', 'Api\v1\Tag\TagController@store');
Route::patch('tags/{id}', 'Api\v1\Tag\TagController@update')->where('id', '[0-9]+');
Route::delete('tags/{id}', 'Api\v1\Tag\TagController@destroy')->where('id', '[0-9]+');

/*
 * Category
 */
Route::post('categories', 'Api\v1\Category\CategoryController@store');
Route::patch('categories/{id}', 'Api\v1\Category\CategoryController@update')->where('id', '[0-9]+');
Route::delete('categories/{id}', 'Api\v1\Category\CategoryController@destroy')->where('id', '[0-9]+');
