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
            'slug' => 'admin',
            'name' => 'Adminstrateur',
        ]);
        Role::insert([
            'slug' => 'hike_manager',
            'name' => 'Guide',
        ]);
        Role::insert([
            'slug' => 'hiker',
            'name' => 'Participant',
        ]);
    }
}
