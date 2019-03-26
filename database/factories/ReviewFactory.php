<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 10, $max = 45),
        'bus_information_id' => $faker->numberBetween($min = 3, $max = 25),
        'comment' => $faker->text($maxNbChars = 250),
        'rate' => $faker->numberBetween($min = 3, $max = 5)
    ];
});
