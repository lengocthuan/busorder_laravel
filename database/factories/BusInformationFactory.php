<?php

use Faker\Generator as Faker;

$factory->define(App\BusInformation::class, function (Faker $faker) {
    return [
        'bus_router_id' => $faker->numberBetween($min = 1, $max = 15),
        'driver_id' => $faker->numberBetween($min = 1, $max = 5),
        'ticket_control' => $faker->numberBetween($min = 6, $max = 13),
        'accompanied_service' => $faker->randomElement($array = array ('waters free','wifi free','WC', 'movies')),
        'status' => $faker->randomElement($array = array ('ready','not ready','not found', 'no connection')),
        'number_seats' => $faker->numberBetween($min = 35, $max = 55),
        'user_id' => $faker->numberBetween($min = 2, $max = 50),
        'ticket_id' => $faker->numberBetween($min = 1, $max = 23)
    ];
});
