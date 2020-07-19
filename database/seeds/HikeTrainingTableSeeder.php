<?php

use Illuminate\Database\Seeder;
use App\Models\Training;
use App\Models\Hike;

class HikeTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) DB::table('hike_training')->insert(['hike_id' => Hike::all()->random()->id,'training_id' => Training::all()->random()->id]);
    }
}
