<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ActivationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('activations')->insert([
          'user_id' => 1,
          'code' => rand(255, 255),
          'completed' => 1,
          'completed_at' => Carbon::now(),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

      }
    }
