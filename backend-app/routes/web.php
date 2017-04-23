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

    Route::get('/category', 'WebPostController@indexCategory');
    Route::get('/category/{id}', 'WebPostController@showCategory');

    Route::get('/tag', 'WebPostController@indexTag');
    Route::get('/tag/{id}', 'WebPostController@showTag');
});


/**
 * Profile
 */
Route::get('profile', 'Web\ProfileController@index');

/**
 * Contact
 */
Route::get('contact', 'Web\ContactController@index');
