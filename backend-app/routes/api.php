<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Authenticate
 */
$router->post('authenticate', 'AuthenticateController@authenticate')->name('authenticate');

/**
 * Post.
 */
$router->get('posts', 'PostController@index')->name('posts');
$router->get('posts/{id}', 'PostController@show')->where('id', '[0-9]+')->name('post');

/*
 * Category
 */
$router->get('categories', 'CategoryController@index')->name('categories');
$router->get('categories/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('category');

/*
* Tag
*/
$router->get('tags', 'TagController@index')->name('tags');
$router->get('tags/{id}', 'TagController@show')->where('id', '[0-9]+')->name('tag');

/**
 * Config
 */
$router->get('configs', 'ConfigController@index')->name('configs');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

$router->group(['middleware' => 'jwt-auth'], function () use ($router) {
    /*
     * Post
     */
    $router->post('posts', 'PostController@store')->name('post.store');
    $router->patch('posts/{id}', 'PostController@update')->where('id', '[0-9]+')->name('post.patch');
    $router->delete('posts/{id}', 'PostController@destroy')->where('id', '[0-9]+')->name('post.delete');

    /*
    * Category
    */
    $router->post('categories', 'CategoryController@store')->name('category.store');
    $router->patch('categories/{id}', 'CategoryController@update')->where('id', '[0-9]+')->name('category.update');
    $router->delete('categories/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('category.destroy');

    /*
     * Tag
     */
    $router->post('tags', 'TagController@store')->name('tag.store');
    $router->patch('tags/{id}', 'TagController@update')->where('id', '[0-9]+')->name('tag.update');
    $router->delete('tags/{id}', 'TagController@destroy')->where('id', '[0-9]+')->name('tag.destroy');

    /**
     * Config
     */
    $router->patch('configs', 'ConfigController@update');
});
