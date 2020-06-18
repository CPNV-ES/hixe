<?php

use Illuminate\Database\Seeder;
use App\Models\Hike;
use App\Models\Destination;

class DestinationHikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destination_hike')->insert([
            'hike_id' => Hike::all()->random()->id,
            'destination_id' => Destination::all()->random()->id,
        ]);
        DB::table('destination_hike')->insert([
            'hike_id' => Hike::all()->random()->id,
            'destination_id' => Destination::all()->random()->id,
        ]);
        DB::table('destination_hike')->insert([
            'hike_id' => Hike::all()->random()->id,
            'destination_id' => Destination::all()->random()->id,
        ]);
    }
}