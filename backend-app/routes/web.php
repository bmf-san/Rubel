<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Home.
 */
$router->get('/', 'HomeController@index')->name('home');

/*
 * Post
 */
$router->group(['prefix' => 'posts'], function () use ($router) {
    $router->get('/', 'PostController@index')->name('posts');
    $router->get('/category/{category}', 'CategoryController@getPosts')->name('posts.category');
    $router->get('/tag/{tag}', 'TagController@getPosts')->name('posts.tag');
});
$router->get('/post/{post}', 'PostController@show')->name('post');

/**
* Tag
*/
$router->get('/tag', 'TagController@index')->name('tags');

/**
 * Category
 */
$router->get('/category', 'CategoryController@index')->name('categories');

/**
 * Profile
 */
$router->get('profile', 'ProfileController@index')->name('profile');

/**
 * Contact
 */
$router->get('contact', 'ContactController@index')->name('contact');
