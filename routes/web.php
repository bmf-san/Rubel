<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Pages\TopController@getIndex');

    Route::get('/post/{id}', 'Pages\PostController@getPost');
    Route::get('/posts', 'Pages\PostController@getPosts');

    Route::get('admin/login', 'Auth\Admin\LoginController@showLoginForm');
    Route::post('admin/login', 'Auth\Admin\LoginController@login');
    Route::post('admin/logout', 'Auth\Admin\LoginController@logout');
});

Route::group(['middleware' => 'auth:admins'], function () {
    Route::get('adminpage', 'Pages\AdminController@getIndex');

    // Routing related to create, edit, update, delete posts.
});
