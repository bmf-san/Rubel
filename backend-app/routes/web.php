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

/**
 * Profile
 */
Route::get('profile', 'Web\ProfileController@index');

/**
 * Contact
 */
Route::get('contact', 'Web\ContactController@index');
