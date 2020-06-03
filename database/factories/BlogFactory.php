<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->title,
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraph,
        'image' => null,
    ];
});
