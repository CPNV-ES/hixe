<?php

use Illuminate\Database\Seeder;
use App\Equipment;
use App\Hike;

class EquipmentHikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Hike::all() as $hike) {
            for ($i = 0; $i < rand(0,4); $i++) DB::table('equipment_hike')->insert(['hike_id' => $hike->id, 'equipment_id' => Equipment::all()->random()->id]);
        }
    }
}
