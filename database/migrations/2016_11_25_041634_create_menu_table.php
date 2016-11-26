<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menus', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('menu_cat_id')->unsigned();
        $table->string('menuName');
        $table->string('menuDesc');
        $table->float('menuPrice');
        $table->date('menuDate');
        $table->timestamps();
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
        Schema::drop('menus');
    }
}
