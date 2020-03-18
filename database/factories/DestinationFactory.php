<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destination;
use Faker\Generator as Faker;

$factory->define(Destination::class, function (Faker $faker) {
    return [
        'location' => $faker->city,
        'latitude' => $faker->latitude($min = 0, $max =  90),
        'longitude' => $faker->longitude($min = 0, $max = 180),
        'order' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
