<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hike;
use App\Models\Role;

class HikeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hike_user')->insert([
            'user_id' => User::all()->random()->id,
            'hike_id' => Hike::all()->random()->id,
            'role_id' => Role::all()->random()->id,
        ]);
        DB::table('hike_user')->insert([
            'user_id' => User::all()->random()->id,
            'hike_id' => Hike::all()->random()->id,
            'role_id' => Role::all()->random()->id,
        ]);
        DB::table('hike_user')->insert([
            'user_id' => User::all()->random()->id,
            'hike_id' => Hike::all()->random()->id,
            'role_id' => Role::all()->random()->id,
        ]);
        DB::table('hike_user')->insert([
            'user_id' => User::all()->random()->id,
            'hike_id' => Hike::all()->random()->id,
            'role_id' => Role::all()->random()->id,
        ]);

    }
}
