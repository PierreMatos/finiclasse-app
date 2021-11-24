<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessStudiesStateIdToBusinessStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_studies', function (Blueprint $table) {
            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('business_studies_states');
            
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
