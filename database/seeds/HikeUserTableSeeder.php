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
            'user_id' => factory(User::class)->create()->id,
            'hike_id' => factory(Hike::class)->create()->id,
            'role_id' => factory(Role::class)->create()->id,
        ]);
    }
}
