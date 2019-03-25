<?php

use Faker\Generator as Faker;

$factory->define(App\RoleUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'role_id' => $faker->numberBetween($min = 2, $max = 5)
    ];
});
