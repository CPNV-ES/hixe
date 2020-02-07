<?php

use Illuminate\Database\Seeder;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipments')->insert(
            [
                'name' => 'Snowmobile',
            ],
            [
                'name' => 'Sticks',
            ],
            [
                'name' => 'Bindings',
            ]
        );
    }
}
