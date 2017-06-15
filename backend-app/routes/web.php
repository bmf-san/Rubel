<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Home.
 */
$router->get('/', 'HomeController@index');

/*
 * Post
 */
$router->group(['prefix' => 'post'], function () use ($router) {
    $router->get('/', 'PostController@index');
    $router->get('/{id}', 'PostController@show')->where('id', '[0-9]+');

    $router->get('/category/{id}/{name}', 'CategoryController@getPosts')->where('id', '[0-9]+');

    $router->get('/tag/{id}/{name}', 'TagController@getPosts')->where('id', '[0-9]+');
});

/**
* Tag
*/
$router->get('/tag', 'TagController@index');

/**
 * Category
 */
$router->get('/category', 'CategoryController@index');

/**
 * Profile
 */
$router->get('profile', 'ProfileController@index');

/**
 * Contact
 */
$router->get('contact', 'ContactController@index');
