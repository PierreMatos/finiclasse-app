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
            $table->string('variant');
            $table->integer('motorization');
            $table->integer('category_id')->unsigned();
            $table->dateTime('registration');
            $table->integer('condition_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('komm');
            $table->integer('warranty_stand');
            $table->integer('warranty_make');
            $table->string('plate');
            $table->integer('stand_id')->unsigned();
            $table->integer('price');
            $table->integer('price_base');
            $table->integer('price_new');
            $table->integer('price_campaign');
            $table->boolean('tradein');
            $table->integer('tradein_purchase');
            $table->integer('tradein_sale');
            $table->boolean('felxible');
            $table->boolean('deductible');
            $table->integer('power');
            $table->integer('km');
            $table->integer('transmission_id')->unsigned();
            $table->string('color_interior');
            $table->string('color_exterior');
            $table->boolean('metallic_color');
            $table->integer('drive_id')->unsigned();
            $table->integer('door');
            $table->integer('seats');
            $table->integer('class_id')->unsigned();
            $table->integer('autonomy');
            $table->integer('emissions');
            $table->integer('iuc');
            $table->integer('registration_count');
            $table->dateTime('order_date');
            $table->dateTime('arrival_date');
            $table->dateTime('delivery_date');
            $table->integer('chassi_number');
            $table->dateTime('iuc_expiration_date');
            $table->dateTime('inspection_expiration_date');
            $table->string('tradein_observations');
            $table->integer('consumption');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('category_id')->references('id')->on('car_categories');
            $table->foreign('condition_id')->references('id')->on('car_conditions');
            $table->foreign('state_id')->references('id')->on('car_states');
            $table->foreign('stand_id')->references('id')->on('stands');
            $table->foreign('transmission_id')->references('id')->on('car_transmissions');
            $table->foreign('drive_id')->references('id')->on('car_drives');
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
