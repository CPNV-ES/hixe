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
            'name' => 'Préparation',
        ]);
        State::insert([
            'name' => 'Inscriptions',
        ]);
        State::insert([
            'name' => 'Prête',
        ]);
        State::insert([
            'name' => 'Annulée',
        ]);
        State::insert([
            'name' => 'Effectuée',
        ]);
    }
}
