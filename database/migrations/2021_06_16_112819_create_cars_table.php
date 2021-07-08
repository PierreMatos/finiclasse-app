<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->string('variant')->nullable();
            $table->integer('motorization')->nullable();
            $table->integer('category_id')->unsigned();
            $table->dateTime('registration')->nullable();
            $table->integer('condition_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('komm')->nullable();
            $table->integer('warranty_stand')->nullable();
            $table->integer('warranty_make')->nullable();
            $table->string('plate')->nullable();
            $table->integer('stand_id')->unsigned()->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_base')->nullable();
            $table->integer('price_new')->nullable();
            $table->integer('price_campaign')->nullable();
            $table->boolean('tradein')->nullable();
            $table->integer('tradein_purchase')->nullable();
            $table->integer('tradein_sale')->nullable();
            $table->boolean('felxible')->nullable();
            $table->boolean('deductible')->nullable();
            $table->integer('power')->nullable();
            $table->integer('km')->nullable();
            $table->integer('transmission_id')->unsigned()->nullable();
            $table->string('color_interior')->nullable();
            $table->string('color_exterior')->nullable();
            $table->boolean('metallic_color')->nullable();
            $table->integer('drive_id')->unsigned()->nullable();
            $table->integer('fuel_id')->unsigned()->nullable();
            $table->integer('door')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('class_id')->unsigned()->nullable();
            $table->integer('autonomy')->nullable();
            $table->integer('emissions')->nullable();
            $table->integer('iuc')->nullable();
            $table->integer('registration_count')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->dateTime('arrival_date')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->integer('chassi_number')->nullable();
            $table->dateTime('iuc_expiration_date')->nullable();
            $table->dateTime('inspection_expiration_date')->nullable();
            $table->string('tradein_observations')->nullable();
            $table->integer('consumption')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('category_id')->references('id')->on('car_categories');
            $table->foreign('condition_id')->references('id')->on('car_conditions');
            $table->foreign('state_id')->references('id')->on('car_states');
            $table->foreign('stand_id')->references('id')->on('stands');
            $table->foreign('transmission_id')->references('id')->on('car_transmissions');
            $table->foreign('drive_id')->references('id')->on('car_drives');
            $table->foreign('fuel_id')->references('id')->on('car_fuels');
            $table->foreign('class_id')->references('id')->on('car_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
