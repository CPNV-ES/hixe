<?php

use App\HikeType;
use Illuminate\Database\Seeder;

class HikeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HikeType::insert([
            ['name' => 'rando'],
            ['name' => 'hors-piste'],
            ['name' => 'haute route'],
            ['name' => 'alpinisme']
        ]);
    }
}