<?php

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipment::insert([
            'name' => 'Snowmobile',
        ]);
        Equipment::insert([
            'name' => 'Sticks',
        ]);
        Equipment::insert([
            'name' => 'Bindings',
        ]);
    }
}
