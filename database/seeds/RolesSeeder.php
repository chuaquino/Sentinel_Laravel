<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'slug' => 'admin',
        'name' => 'Admin',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);

      DB::table('roles')->insert([
        'slug' => 'guest',
        'name' => 'Guest',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);
    }
}
