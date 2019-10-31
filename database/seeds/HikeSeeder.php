<?php

use App\Models\Hike;
use Illuminate\Database\Seeder;

class HikeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $nbToCreate = 3;
    factory(Hike::class, $nbToCreate)->create();
  }
}
