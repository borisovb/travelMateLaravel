<?php

use Faker\Generator as Faker;

$factory->define(App\Story::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'user_id' => '1',
        'content' => $faker->realText(200),
        'approved' => true
    ];
});
