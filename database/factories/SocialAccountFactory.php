<?php

use Faker\Generator as Faker;

$factory->define(App\SocialAccount::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 7, $max = 39),
        'provider' => $faker->text($maxNbChars = 50),
        'provider_id' => $faker->numberBetween($min = 1, $max = 5),
        'description' => $faker->text($maxNbChars = 200)
    ];
});
