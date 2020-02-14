<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**brouillon
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            'name' => 'Draft',
        ]);
        State::insert([
            'name' => 'Open',
        ]);
        State::insert([
            'name' => 'Confirmed',
        ]);
        State::insert([
            'name' => 'Cancelled',
        ])
        ;State::insert([
        'name' => 'Done',
        ]);
    }
}
