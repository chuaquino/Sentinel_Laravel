<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu_cat', function (Blueprint $table) {
        $table->increments('menu_cat_id')->unsigned();
        $table->string('menuCatName');
        
        $table->engine = 'InnoDB';
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_cat');
    }
}
