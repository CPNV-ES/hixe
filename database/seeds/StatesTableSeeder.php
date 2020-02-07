<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**brouillon
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(
            [
                'name' => 'Draft',
            ],
            [
                'name' => 'Open',
            ],
            [
                'name' => 'Confirmed',
            ],
            [
                'name' => 'Cancelled',
            ],
            [
                'name' => 'Done',
            ]
        );
    }
}
