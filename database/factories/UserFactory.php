<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email_address' => $faker->unique()->safeEmail,
        'member_number' => $faker->numberBetween($min = 1000, $max = 9000),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => Hash::make('Pa$$w0rd'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
