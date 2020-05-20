<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,4),
        'caption' => $faker->company,
        'ubication' => $faker->country,
        'description' => $faker->bs,
        'prize' => $faker->numberBetween(10,40),
        'type' => $faker->name,
        'image' => $faker->image($dir = "storage", $width = 300, $height = 409, 'cats', false),
    ];
});
