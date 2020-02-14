<?php

use App\Models\Hike;
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
    $nbToCreate = 3;
    factory(App\Models\Hike::class, $nbToCreate)->create();
  }
}
