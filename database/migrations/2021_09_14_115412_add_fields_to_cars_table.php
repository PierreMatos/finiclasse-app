<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            
            $table->integer('extras_total')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('buying_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('iva')->nullable();
            $table->integer('isv')->nullable();
            $table->integer('ptl')->nullable();
            $table->integer('sigpu')->nullable();
            $table->longtext('equipment')->nullable();
 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
