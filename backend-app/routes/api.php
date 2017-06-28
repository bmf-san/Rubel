<?php


/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

/**
 * Authenticate
 */
$router->post('authenticate', 'AuthenticateController@authenticate');

/**
 * Post.
 */
$router->get('posts', 'PostController@index');
$router->get('posts/{id}', 'PostController@show')->where('id', '[0-9]+');

/*
 * Category
 */
$router->get('categories', 'CategoryController@index');
$router->get('categories/{id}', 'CategoryController@show')->where('id', '[0-9]+');

/*
* Tag
*/
$router->get('tags', 'TagController@index');
$router->get('tags/{id}', 'TagController@show')->where('id', '[0-9]+');

/**
 * Config
 */
$router->get('configs', 'ConfigController@index');

/*
|--------------------------------------------------------------------------
| Private API Routes
|--------------------------------------------------------------------------
*/

/*
 * Post
 */
$router->post('posts', 'PostController@store');
$router->patch('posts/{id}', 'PostController@update')->where('id', '[0-9]+');
$router->delete('posts/{id}', 'PostController@destroy')->where('id', '[0-9]+');

/*
* Category
*/
$router->post('categories', 'CategoryController@store');
$router->patch('categories/{id}', 'CategoryController@update')->where('id', '[0-9]+');
$router->delete('categories/{id}', 'CategoryController@destroy')->where('id', '[0-9]+');

/*
 * Tag
 */
$router->post('tags', 'TagController@store');
$router->patch('tags/{id}', 'TagController@update')->where('id', '[0-9]+');
$router->delete('tags/{id}', 'TagController@destroy')->where('id', '[0-9]+');

/**
 * Config
 */
$router->patch('configs', 'ConfigController@update');
