<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Rubel\Models\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Rubel\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
    ];
});

$factory->define(Rubel\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => factory(Rubel\Models\Post::class)->create()->id,
        'comment' => $faker->realText()
    ];
});

$factory->define(Rubel\Models\Config::class, function (Faker\Generator $faker) {
    return [
        'name' => facotry(Rubel\Models\Post::class)->create()->id,
        'comment' => $faker->realText()
    ];
});

$factory->define(Rubel\Models\Post::class, function (Faker\Generator $faker) {
    // HACK
    if ($faker->randomElement(['public', 'draft']) == 'public') {
        return [
            'admin_id' => factory(Rubel\Models\Admin::class)->create()->id,
            'category_id' => factory(Rubel\Models\Category::class)->create()->id,
            'title' => $faker->title,
            'md_content' => $faker->realText(),
            'html_content' => '<p>' . "$faker->realText()" . "<p>",
            'publication_status' => 'public',
            'published_at' => $faker->date('Y-m-d')
        ];
    } else {
        return [
            'admin_id' => factory(Rubel\Models\Admin::class)->create()->id,
            'category_id' => factory(Rubel\Models\Category::class)->create()->id,
            'title' => $faker->title,
            'md_content' => $faker->realText(),
            'html_content' => '<p>' . "$faker->realText()" . "<p>",
            'publication_status' => 'draft',
            'published_at' => $faker->date('Y-m-d')
        ];
    }
});
