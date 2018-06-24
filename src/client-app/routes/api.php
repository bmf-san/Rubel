<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Authenticate
 */
$router->post('authenticate', 'AuthenticateController@authenticate')->name('authenticate.authenticate');

/**
 * Post.
 */
$router->get('posts', 'PostController@index')->name('posts.index');
$router->get('posts/{id}', 'PostController@show')->where('id', '[0-9]+')->name('posts.show');

/*
 * Category
 */
$router->get('categories', 'CategoryController@index')->name('categories.index');
$router->get('categories/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('categories.show');

/*
* Tag
*/
$router->get('tags', 'TagController@index')->name('tags.index');
$router->get('tags/{id}', 'TagController@show')->where('id', '[0-9]+')->name('tags.show');

/**
 * Setting
 */
$router->get('settings', 'SettingController@index')->name('settings.index');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

$router->group(['middleware' => 'jwt-auth'], function () use ($router) {
    /*
     * Post
     */
    $router->post('posts', 'PostController@store')->name('posts.store');
    $router->patch('posts/{id}', 'PostController@update')->where('id', '[0-9]+')->name('posts.update');
    $router->delete('posts/{id}', 'PostController@destroy')->where('id', '[0-9]+')->name('posts.destroy');

    /*
    * Category
    */
    $router->post('categories', 'CategoryController@store')->name('categories.store');
    $router->patch('categories/{id}', 'CategoryController@update')->where('id', '[0-9]+')->name('categories.update');
    $router->delete('categories/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('categories.destroy');

    /*
     * Tag
     */
    $router->post('tags', 'TagController@store')->name('tags.store');
    $router->patch('tags/{id}', 'TagController@update')->where('id', '[0-9]+')->name('tags.update');
    $router->delete('tags/{id}', 'TagController@destroy')->where('id', '[0-9]+')->name('tags.destroy');

    /**
     * Setting
     */
    $router->patch('settings', 'SettingController@update')->name('settings.update');
});
