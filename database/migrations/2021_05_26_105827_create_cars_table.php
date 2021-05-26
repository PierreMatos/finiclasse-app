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
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('variant');
            $table->integer('motorization');
            $table->integer('category_id');
            $table->dateTime('registration');
            $table->integer('condition_id');
            $table->integer('state_id');
            $table->integer('komm');
            $table->integer('warranty_stand');
            $table->integer('warranty_make');
            $table->string('plate');
            $table->string('stand_id');
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
            $table->string('transmission_id');
            $table->string('color_interior');
            $table->string('color_exterior');
            $table->boolean('metallic_color');
            $table->string('drive_id');
            $table->integer('door');
            $table->integer('seats');
            $table->string('class_id');
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
