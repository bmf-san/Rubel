<?php
use Rubel\Models\Admin;
use Rubel\Models\Category;
use Rubel\Models\Comment;
use Rubel\Models\Setting;
use Rubel\Models\Post;
use Rubel\Models\Tag;
use Rubel\Models\TagPost;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * Admin
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(config('rubel.admin.password')),
        'remember_token' => str_random(10),
    ];
});

/**
 * Category
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word . uniqid(),
    ];
});

/**
 * Tag
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word . uniqid(),
    ];
});

/**
 * Comment
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->randomElement(Post::pluck('id')->toArray()),
        'comment' => $faker->realText(),
    ];
});

/**
 * Setting
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Setting::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText(),
        'alias_name' => $faker->realText(),
        'value' => $faker->realText(),
    ];
});

/**
 * Post
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'admin_id' => $faker->randomElement(Admin::pluck('id')->toArray()),
        'category_id' => $faker->randomElement(Category::pluck('id')->toArray()),
        'title' => $faker->word . uniqid(),
        'md_content' => $faker->realText,
        'html_content' => '<p>' . $faker->realText . "<p>",
        'publication_status' => $faker->randomElement(['public', 'draft']),
        'published_at' => $faker->date('Y-m-d'),
    ];
});

/**
 * TagPost
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(TagPost::class, function (Faker\Generator $faker) {
    return [
        'tag_id' => $faker->randomElement(Tag::pluck('id')->toArray()),
        'post_id' => $faker->randomElement(Post::pluck('id')->toArray()),
    ];
});
