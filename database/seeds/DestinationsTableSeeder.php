<?php

use Illuminate\Database\Seeder;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Destination::class, 5)->create();
    }
}
