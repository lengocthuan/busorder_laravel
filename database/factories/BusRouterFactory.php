<?php

use Faker\Generator as Faker;

$factory->define(App\BusRouter::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName(),
        'description' => $faker->text($maxNbChars = 300),
        'starting_point' => $faker->numberBetween($min = 1, $max = 20),
        'destination' => $faker->numberBetween($min = 21, $max = 40)
    ];
});
