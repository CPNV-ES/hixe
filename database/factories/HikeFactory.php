<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hike;
use App\HikeType;
use App\State;
use Faker\Generator as Faker;

$factory->define(Hike::class, function (Faker $faker) {
    $names = ["Pigne d'Arolla","Glacier du Tour","Miroir d'Argentine","Dent de Morcles","Becs du Bosson","Dent Blanche","Mont Tendre","Aiguilles Vertes","Aiguilles Rouges","Zinal Rothorn","Weisshorn","Bishorn","Castor et Pollux","Plaine Morte"];
    $bdate = $faker->dateTimeBetween('-1 month', '+1 month');
    return [
        'name' => $names[rand(0,count($names)-1)],
        'meeting_location' => $faker->streetAddress,
        'meeting_date' => $bdate,
        'beginning_date' => $bdate,
        'ending_date' => $bdate,
        'min_num_participants' => $faker->randomNumber(1),
        'max_num_participants' => $faker->randomNumber(1),
        'difficulty' => rand(1,5),
        'additional_info' => $faker->text(45),
        'drop_in_altitude' => $faker->randomNumber(3),
        'state_id' => State::all()->random()->id,
        'type_id' => HikeType::all()->random()->id,
    ];
});
