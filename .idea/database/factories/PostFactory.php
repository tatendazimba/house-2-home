<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
        "content" => $faker->sentences(20, true),
        "text_colour" => "black-text"
    ];
});
