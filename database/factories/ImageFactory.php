<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
	static $imageUrl;
    return [
        'name' => $faker->text($maxNbChars = 50),
        'description' => $imageUrl = ('http://lorempixel.com/g/800/600/transport/'),
        'bus_information_id' => $faker->numberBetween($min = 1, $max = 30),
        'user_id' => $faker->numberBetween($min = 2, $max = 53),
        'ticket_id' => $faker->numberBetween($min = 1, $max = 23)
    ];
});
