<?php

use Illuminate\Database\Seeder;
use App\Hike;
use App\Destination;

class DestinationHikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Hike::all() as $hike) {
            for ($i = 0; $i < rand(1,4); $i++) DB::table('destination_hike')->insert(['hike_id' => $hike->id, 'destination_id' => Destination::all()->random()->id]);
        }
    }
}
