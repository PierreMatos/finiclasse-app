<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitMarginsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_margins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id')->unsigned();
            $table->integer('car_fuel_id')->unsigned();
            $table->integer('car_category_id')->unsigned();
            $table->integer('level_1');
            $table->integer('level_2');
            $table->integer('level_3');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('make_id')->references('id')->on('makes');
            $table->foreign('car_fuel_id')->references('id')->on('car_fuels');
            $table->foreign('car_category_id')->references('id')->on('car_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profit_margins');
    }
}
