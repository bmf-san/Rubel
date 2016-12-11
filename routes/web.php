<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Page\TopController@getIndex');
    Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('admin/login', 'AdminAuth\LoginController@login');
    Route::post('admin/logout', 'AdminAuth\LoginController@logout');
});

Route::group(['middleware' => 'auth:admins'], function () {
    Route::get('adminpage', 'Admin\AdminController@getIndex');
});
