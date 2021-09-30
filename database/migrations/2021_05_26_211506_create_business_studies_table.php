<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessStudiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_studies', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('client_id');
            // $table->integer('car_id');
            $table->integer('extras_total')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('total_benefits')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('tradein_diff')->nullable();
            $table->integer('settle_amount')->nullable();
            $table->integer('total_diff_amount')->nullable();
            $table->integer('total_discount_amount')->nullable();
            $table->integer('total_discount_perc')->nullable();
            $table->integer('iva')->nullable();
            $table->integer('isv')->nullable();
            $table->integer('business_study_authorization_id')->unsigned()->nullable();
            $table->integer('tradein_id')->unsigned()->nullable()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('business_study_authorization_id')->references('id')->on('business_study_authorizations');
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
        Schema::drop('business_studies');
    }
}
