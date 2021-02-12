<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'id' => 1,
            'slug' => 'hike_manager',
            'name' => 'Guide',
        ]);
        Role::insert([
            'id' => 2,
            'slug' => 'hiker',
            'name' => 'Participant',
        ]);
        Role::insert([
            'id' => 3,
            'slug' => 'admin',
            'name' => 'Adminstrateur',
        ]);
    }
}
