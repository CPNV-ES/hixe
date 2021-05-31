<?php

use App\Hike;
use Illuminate\Database\Seeder;

class HikesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $nbToCreate = 12;
    factory(Hike::class, $nbToCreate)->create();
  }
}
