<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->string('type');
            $table->integer('amount');
            $table->dateTime('beginning');
            $table->dateTime('end');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('make_id')->references('id')->on('makes');
            $table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaigns');
    }
}
