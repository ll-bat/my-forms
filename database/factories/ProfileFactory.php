<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => '',
        'firstname' => $faker->name,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'postalCode' => $faker->postcode,
        'aboutMe' => $faker->sentence,
        'avatar' => '',
        'background' => '',
    ];
});
