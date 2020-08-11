<?php

use Illuminate\Database\Seeder;
use App\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::create(["location" =>  "Chamonix", "latitude" => 45.9319773, "longitude" => 6.7885343]);
        Destination::create(["location" =>  "Grands Montets", "latitude" => 45.9483324, "longitude" => 6.9523349]);
        Destination::create(["location" =>  "Refuge d’Argentière", "latitude" => 45.9463031, "longitude" => 7.0026492]);
        Destination::create(["location" =>  "Col du Passon", "latitude" => 45.9761151, "longitude" => 6.9658195]);
        Destination::create(["location" =>  "Col du Tour", "latitude" => 45.848341, "longitude" => 6.2885395]);
        Destination::create(["location" =>  "Cabane de Trient", "latitude" => 45.9995954, "longitude" => 7.04148]);
        Destination::create(["location" =>  "Col des Ecandies", "latitude" => 46.0088981, "longitude" => 7.0174875]);
        Destination::create(["location" =>  "Champex", "latitude" => 46.0296981, "longitude" => 7.0997075]);
        Destination::create(["location" =>  "Verbier", "latitude" => 46.0994399, "longitude" => 7.2075935]);
        Destination::create(["location" =>  "Cabane de Prafleuri", "latitude" => 46.074929, "longitude" => 7.376646]);
        Destination::create(["location" =>  "Lac des Dix", "latitude" => 46.0561861, "longitude" => 7.3659423]);
        Destination::create(["location" =>  "Pas du Chat", "latitude" => 46.5500529, "longitude" => 6.7868112]);
        Destination::create(["location" =>  "Cabane des Dix", "latitude" => 46.011138, "longitude" => 7.415663]);
        Destination::create(["location" =>  "Pigne d’Arolla", "latitude" => 45.9912981, "longitude" => 7.4375375]);
        Destination::create(["location" =>  "Cabane des Vignettes", "latitude" => 45.9897222, "longitude" => 7.4736393]);
        Destination::create(["location" =>  "Col de l’Evêque", "latitude" => 45.9582981, "longitude" => 7.4789675]);
        Destination::create(["location" =>  "Bertol", "latitude" => 46.0061769, "longitude" => 7.5254927]);
        Destination::create(["location" =>  "Tête Blanche", "latitude" => 45.9874614, "longitude" => 7.5575986]);
        Destination::create(["location" =>  "Glacier du Stöckji", "latitude" => 45.9943628, "longitude" => 7.5930973]);
        Destination::create(["location" =>  "Zermatt", "latitude" => 45.990499, "longitude" => 7.6015173]);
    }
}
