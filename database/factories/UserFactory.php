<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $passWord;
    return [
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName(),
        'userName' => $faker->userName(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'passWord' => $passWord ?: $passWord = bcrypt('secret'),
        'remember_token' => Str::random(10),
        'numPhone' => $faker->phoneNumber(),
        'birthDay' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
    ];
});
