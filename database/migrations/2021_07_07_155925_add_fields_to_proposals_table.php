<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->integer('tradein_diff')->nullable();
            $table->integer('settle_amount')->nullable();
            $table->integer('total_diff_amount')->nullable();
            $table->integer('total_discount_amount')->nullable();
            $table->integer('total_discount_perc')->nullable();
            $table->integer('car_id')->unsigned()->nullable();
            $table->integer('tradein_id')->unsigned()->nullable();

            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('tradein_id')->references('id')->on('cars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            //
        });
    }
}
