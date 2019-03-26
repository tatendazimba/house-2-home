<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        "url" => $faker->unique()->imageUrl(640, 480, "sports", true),
        "caption" => $faker->sentence
    ];
});
