<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 80),
        'description' => $faker->text($maxNbChars = 200),
        'price' => $faker->numberBetween($min = 110000, $max = 310000),
        'time_allow_order' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now', $timezone = 'Asia/Bangkok'),
        'time_start' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Asia/Bangkok'),
        'time_end' => $faker->dateTimeInInterval($startDate = '+ 5 days', $interval = '+ 1 days', $timezone = 'Asia/Bangkok')
    ];
});
