<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        'certificate_number' => $faker->randomNumber($nbDigits = 8, $strict = false),
        'description' => $faker->text($maxNbChars = 50),
    ];
});
