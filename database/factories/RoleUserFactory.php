<?php

use Faker\Generator as Faker;

$factory->define(App\RoleUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 53),
        'role_id' => $faker->numberBetween($min = 2, $max = 5)
    ];
});
