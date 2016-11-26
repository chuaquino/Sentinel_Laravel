<?php

use Illuminate\Database\Seeder;

class MenuCatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menu_cat')->insert([
        'menuCatName' => 'breakfast',
    ]);

    DB::table('menu_cat')->insert([
        'menuCatName' => 'dinner',
    ]);

    DB::table('menu_cat')->insert([
        'menuCatName' => 'others',
    ]);
    }
}
