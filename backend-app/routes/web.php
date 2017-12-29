<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * Home.
 */
$router->get('/', 'HomeController@index')->name('root.index');

/*
 * Post
 */
$router->group(['prefix' => 'posts'], function () use ($router) {
    $router->get('/', 'PostController@index')->name('posts.index');
    $router->get('/{post}', 'PostController@show')->name('posts.show');
    $router->get('/categories/{category}', 'CategoryController@getPosts')->name('posts.categories.getPosts');
    $router->get('/tags/{tag}', 'TagController@getPosts')->name('posts.tags.getPosts');
});

/**
* Tag
*/
$router->get('/tags', 'TagController@index')->name('tags.index');

/**
 * Category
 */
$router->get('/categories', 'CategoryController@index')->name('categories.index');

/**
 * Profile
 */
$router->get('profiles', 'ProfileController@index')->name('profiles.index');

/**
 * Contact
 */
$router->get('contacts', 'ContactController@index')->name('contacts.index');

/**
 * Sitemap
 */
$router->get('sitemap', 'SitemapController@index')->name('sitemap');
