<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destination;
use Faker\Generator as Faker;

$factory->define(Destination::class, function (Faker $faker) {
    return [
        'location' => 'Sion',
        'latitude' => $faker->latitude($min = 0, $max =  90),
        'longitude' => $faker->longitude($min = 0, $max = 180),
    ];
});
