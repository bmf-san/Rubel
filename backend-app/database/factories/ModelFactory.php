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
$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => factory(App\Models\Post::class)->create()->id,
        'comment' => $faker->realText()
    ];
});

$factory->define(App\Models\Config::class, function (Faker\Generator $faker) {
    return [
        'name' => facotry(App\Models\Post::class)->create()->id,
        'comment' => $faker->realText()
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    // HACK
    if ($faker->randomElement(['public', 'draft']) == 'public') {
        return [
            'admin_id' => factory(App\Models\Admin::class)->create()->id,
            'category_id' => factory(App\Models\Category::class)->create()->id,
            'title' => $faker->title,
            'md_content' => $faker->realText(),
            'html_content' => '<p>' . "$faker->realText()" . "<p>",
            'publication_status' => 'public',
            'publication_date' => $faker->date('Y-m-d')
        ];
    } else {
        return [
            'admin_id' => factory(App\Models\Admin::class)->create()->id,
            'category_id' => factory(App\Models\Category::class)->create()->id,
            'title' => $faker->title,
            'md_content' => $faker->realText(),
            'html_content' => '<p>' . "$faker->realText()" . "<p>",
            'publication_status' => 'draft',
            'publication_date' => $faker->date('Y-m-d')
        ];
    }
});
