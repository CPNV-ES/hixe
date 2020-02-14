<?php

use Illuminate\Database\Seeder;
use App\Models\Equipment;
use App\Models\Hike;

class EquipmentHikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment_hike')->insert([
            'hike_id' => factory(Hike::class)->create()->id,
            'equipment_id' => factory(Equipment::class)->create()->id,
        ]);
    }
}
