<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Pages\TopController@getIndex');
Route::get('post/{id}', 'Post\PostController@getPost')->where('id', '[0-9]+');
Route::get('posts', 'Post\PostController@getPosts');
