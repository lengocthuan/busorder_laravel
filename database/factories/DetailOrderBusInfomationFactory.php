<?php

use Faker\Generator as Faker;

$factory->define(App\DetailOrderBusInfomation::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 30),
        'bus_information_id' => $faker->numberBetween($min = 1, $max = 30),
        'name' => $faker->word(),
        'description' => $faker->text($maxNbChars = 200),
        'order_id' => $faker->numberBetween($min = 1, $max = 30),
        'seat' => $faker->numerify('A ##'),
        'price' => $faker->numberBetween($min = 110000, $max = 320000)
    ];
});
