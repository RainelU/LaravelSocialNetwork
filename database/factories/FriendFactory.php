<?php

use Faker\Generator as Faker;

$factory->define(Laravel\Friend::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 160),
        'friend_id' => $faker->numberBetween($min = 1, $max = 160)
    ];
});