<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array ('agency','customer')),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
