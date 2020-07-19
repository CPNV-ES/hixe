<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Training::create(["certificate_number" =>  5014, "description" => "Rocher et Glace"]);
        \App\Models\Training::create(["certificate_number" =>  5245, "description" => "Escalade sportive Bloc"]);
        \App\Models\Training::create(["certificate_number" =>  5601, "description" => "Météorologie de montagne"]);
        \App\Models\Training::create(["certificate_number" =>  5671, "description" => "Formation glace - trekking glacier"]);
        \App\Models\Training::create(["certificate_number" =>  5621, "description" => "Sauvetage en falaise"]);
        \App\Models\Training::create(["certificate_number" =>  6522, "description" => "Sauvetage - premiers secours"]);
        \App\Models\Training::create(["certificate_number" =>  5250, "description" => "Escalade sportive milieu alpin"]);
    }
}
