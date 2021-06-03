<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hike;
use Illuminate\Support\Facades\DB;

class HikeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Hike::all() as $hike) {
            DB::table('hike_user')->insert([
                'user_id' => User::all()->random()->id,
                'hike_id' => $hike->id,
                'role_id' => 1,
            ]);

            for ($i = 0; $i < rand(2,5); $i++) { 
                DB::table('hike_user')->insert([
                    'user_id' => User::all()->random()->id,
                    'hike_id' => $hike->id,
                    'role_id' => 2,
                ]);
            }
        }
    }
}
