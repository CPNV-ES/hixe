<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hike;
use App\Models\State;
use Faker\Generator as Faker;

$factory->define(Hike::class, function (Faker $faker) {
  return [
    'name' => 'test',
    'meeting_location' => $faker->streetAddress,
    'meeting_date' => $faker->dateTimeBetween('now', '+1 month'),
    'beginning_date' => $faker->dateTimeBetween('now', '+1 day'),
    'ending_date' => $faker->dateTimeBetween('now', '+10 day'),
    'min_num_participants' => $faker->randomNumber(1),
    'max_num_participants' => $faker->randomNumber(1),
    'difficulty' => 5,
    'additional_info' => $faker->text(45),
    'drop_in_altitude' => $faker->randomNumber(3),
    'state_id' => State::all()->random()->id
  ];
});
