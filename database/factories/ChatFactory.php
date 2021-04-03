<?php

use Faker\Generator as Faker;

$factory->define(Laravel\Chat::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetwen($min = 1, $max = 30),
        'friend_id' => $faker->numberBetwen($min = 1, $max = 30),
        'chat' => $faker->text($maxNbChars = 150)
    ];
});
