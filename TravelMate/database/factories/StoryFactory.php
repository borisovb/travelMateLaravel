<?php

use Faker\Generator as Faker;

$factory->define(App\Story::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image' => 'default.png',
        'user_id' => '1',
        'content' => $faker->realText(200),
        'approved' => true
    ];
});
