<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(ActivationsSeeder::class);
        $this->call(MenuCatTableSeeder::class);
    }
}
