<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessStudiesToProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {

            $table->dropColumn('business_study_id');
            $table->integer('initial_business_study_id')->unsigned()->nullable();
            $table->integer('final_business_study_id')->unsigned()->nullable();
            $table->foreign('initial_business_study_id')->references('id')->on('business_studies');
            $table->foreign('final_business_study_id')->references('id')->on('business_studies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposal', function (Blueprint $table) {
            //
        });
    }
}
