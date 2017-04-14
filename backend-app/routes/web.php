<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Home.
 */
Route::get('/', 'Web\HomeController@index');

/*
 * Post
 */
Route::get('posts', 'Web\PostController@index');
Route::get('post/{id}', 'Web\PostController@show')->where('id', '[0-9]+');
