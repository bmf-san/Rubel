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
Route::get('post/{id}', 'Api\v1\Post\Postcontroller@show')->where('id', '[0-9]+');

/*
 * Tag
 */
Route::get('tags', 'Api\v1\Tag\TagController@index');
Route::get('tag/{id}', 'Api\v1\Tag\TagController@show')->where('id', '[0-9]+');

/*
 * Category
 */
Route::get('categories', 'Api\v1\Category\CategoryController@index');
Route::get('category/{id}', 'Api\v1\Category\CategoryController@show')->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {  // TODO: Add authentication
    /*
     * Post
     */
    Route::post('post', 'Api\v1\Post\PostController@store');
    Route::patch('post/{id}', 'Api\v1\Post\PostController@update')->where('id', '[0-9]+');
    Route::delete('post/{id}', 'Api\v1\Post\PostController@destroy')->where('id', '[0-9]+');

    /*
     * Tag
     */
    Route::post('tag', 'Api\v1\Tag\TagController@store');
    Route::patch('tag/{id}', 'Api\v1\Tag\TagController@update')->where('id', '[0-9]+');
    Route::delete('tag/{id}', 'Api\v1\Tag\TagController@destroy')->where('id', '[0-9]+');

    /*
     * Category
     */
    Route::post('category', 'Api\v1\Category\CategoryController@store');
    Route::patch('category/{id}', 'Api\v1\Category\CategoryController@update')->where('id', '[0-9]+');
    Route::delete('category/{id}', 'Api\v1\Category\CategoryController@destroy')->where('id', '[0-9]+');
});
