<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 50),
        'name' => $faker->numerify('Order invoice ###'),
        'total' => $faker->numberBetween($min = 110000, $max = 550000),
        'number_tickets' => $faker->numberBetween($min = 1, $max = 5),
        'status' => $faker->randomElement($array = array ('paid','unpaid'))
    ];
});
