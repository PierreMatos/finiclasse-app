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
            $table->integer('total_benefits');
            $table->integer('selling_price');
            $table->integer('tradein_diff');
            $table->integer('settle_amount');
            $table->integer('total_diff_amount');
            $table->integer('total_discount_amount');
            $table->integer('total_discount_perc');
            $table->integer('iva');
            $table->integer('isv');
            $table->integer('business_study_authorization_id')->unsigned();
            $table->integer('tradein_id')->unsigned()->nullable();
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
