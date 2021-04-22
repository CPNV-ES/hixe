<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {


    $this->call([DestinationHikeTableSeeder::class]);
    $this->call([DestinationsTableSeeder::class]);
    $this->call([EquipmentHikeTableSeeder::class]);
    $this->call([EquipmentTableSeeder::class]);
    $this->call([HikeUserTableSeeder::class]);
    $this->call([RolesTableSeeder::class]);
    $this->call([UsersTableSeeder::class]);
    $this->call([StatesTableSeeder::class]);
    $this->call([TrainingsTableSeeder::class]);
    $this->call([UsersTableSeeder::class]);



    $this->call([HikeTypeTableSeeder::class]);

    $this->call([HikesTableSeeder::class]);

    $this->call([HikeTrainingTableSeeder::class]); 



  }
}
