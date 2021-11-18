<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBusinessStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_studies', function (Blueprint $table) {
            $table->integer('ptl')->nullable();
            $table->integer('total_transf')->nullable();
            $table->integer('extras_total2')->nullable();
            $table->integer('total')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->integer('expenses')->nullable();
            $table->integer('taxes')->nullable();
            $table->integer('warranty')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_studies', function (Blueprint $table) {
            //
        });
    }
}
