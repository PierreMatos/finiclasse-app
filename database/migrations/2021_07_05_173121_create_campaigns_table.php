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
            $table->string('description')->nullable();
            $table->integer('make_id')->unsigned()->nullable();
            $table->integer('model_id')->unsigned()->nullable();
            $table->string('type')->nullable();
            $table->decimal('amount',13,2)->nullable();
            $table->dateTime('beginning')->nullable();
            $table->dateTime('end')->nullable();
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
