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
        DB::table('hike_training')->insert([
            'hike_id' => factory(Hike::class)->create()->id,
            'training_id' => factory(Training::class)->create()->id,
        ]);
    }
}
