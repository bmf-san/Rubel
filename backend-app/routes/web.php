<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Home.
 */
Route::get('/', 'HomeController@index');

/*
 * Post
 */
Route::group(['prefix' => 'post'], function () {
    Route::get('/', 'PostController@index');
    Route::get('/{id}', 'PostController@show')->where('id', '[0-9]+');

    Route::get('/category/{id}/{name}', 'CategoryController@getPosts')->where('id', '[0-9]+');

    Route::get('/tag/{id}/{name}', 'TagController@getPosts')->where('id', '[0-9]+');
});

/**
* Tag
*/
Route::get('/tag', 'TagController@index');

/**
 * Category
 */
Route::get('/category', 'CategoryController@index');

/**
 * Profile
 */
Route::get('profile', 'ProfileController@index');

/**
 * Contact
 */
Route::get('contact', 'ContactController@index');
