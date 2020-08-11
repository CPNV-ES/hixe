<?php

use Illuminate\Database\Seeder;
use App\Equipment;

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
            'name' => 'Crampons',
        ]);
        Equipment::insert([
            'name' => 'Casque',
        ]);
        Equipment::insert([
            'name' => 'Piolet',
        ]);
        Equipment::insert([
            'name' => 'Corde 30m',
        ]);
        Equipment::insert([
            'name' => 'Baudrier',
        ]);
        Equipment::insert([
            'name' => 'Kit Crevasse',
        ]);
        Equipment::insert([
            'name' => 'Mousquetons',
        ]);
    }
}
