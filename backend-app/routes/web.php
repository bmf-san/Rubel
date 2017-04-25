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
Route::group(['prefix' => 'post'], function () {
    Route::get('/', 'Web\PostController@index');
    Route::get('/{id}', 'Web\PostController@show')->where('id', '[0-9]+');

    Route::get('/category/{id}/{name}', 'Web\CategoryController@getPosts')->where('id', '[0-9]+');

    Route::get('/tag/{id}/{name}', 'Web\TagController@getPosts')->where('id', '[0-9]+');
});

/**
* Tag
*/
Route::get('/tag', 'Web\TagController@index');

/**
 * Category
 */
Route::get('/category', 'Web\CategoryController@index');

/**
 * Profile
 */
Route::get('profile', 'Web\ProfileController@index');

/**
 * Contact
 */
Route::get('contact', 'Web\ContactController@index');
