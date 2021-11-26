<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBasepriceToBusinessStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_studies', function (Blueprint $table) {
            $table->decimal('base_price',13,2)->nullable();
            $table->decimal('sigpu',13,2)->nullable();
            
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
