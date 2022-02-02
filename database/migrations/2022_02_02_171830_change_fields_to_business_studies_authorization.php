<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsToBusinessStudiesAuthorization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businenss_study_authorizations', function (Blueprint $table) {

            $table->float('min')->nullable()->change();
            $table->float('max')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businenss_study_authorizations', function (Blueprint $table) {
            //
        });
    }
}
