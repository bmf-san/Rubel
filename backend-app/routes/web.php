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

    Route::get('/category/{id}', 'Web\CategoryController@getPosts')->where('id', '[0-9]+');

    Route::get('/tag/{id}', 'Web\TagController@getPosts')->where('id', '[0-9]+');
});

/**
 * Category
 */
Route::get('/category', 'Web\CategoryController@index');

/**
 * Tag
 */
Route::get('/tag', 'Web\TagController@index');

/**
 * Profile
 */
Route::get('profile', 'Web\ProfileController@index');

/**
 * Contact
 */
Route::get('contact', 'Web\ContactController@index');
