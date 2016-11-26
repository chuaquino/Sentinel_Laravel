<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'roles_id' => '1',
        'first_name' => 'Jane',
        'last_name' => 'Ravela',
        'email' => 'jane@gmail.com',
        'password' => bcrypt('admin123'),
      ]);

    }
}
