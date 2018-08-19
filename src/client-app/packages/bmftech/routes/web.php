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
    $router->get('/{title}', 'PostController@show')->name('posts.show');
    $router->get('/categories/{categoryName}', 'CategoryController@getPosts')->name('posts.categories.getPosts');
    $router->get('/tags/{tagName}', 'TagController@getPosts')->name('posts.tags.getPosts');
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
$router->group(['prefix' => 'contacts'], function () use ($router) {
    $router->get('/', 'ContactController@index')->name('contacts.index');
    $router->post('/', 'ContactController@submit')->name('contacts.submit');
    $router->get('/thanks', 'ContactController@thanks')->name('contacts.thanks');
});

/**
 * Sitemap
 */
$router->get('sitemap', 'SitemapController@index')->name('sitemap.index');

/**
 * Feed
 */
$router->get('feed', 'FeedController@index')->name('feed.index');
