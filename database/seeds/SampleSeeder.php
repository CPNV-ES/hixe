<?php

use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([HikesTableSeeder::class]);
    $this->call([HikeUserTableSeeder::class]);
    $this->call([HikeTrainingTableSeeder::class]);
    $this->call([DestinationHikeTableSeeder::class]);
    $this->call([EquipmentHikeTableSeeder::class]);
  }
}
