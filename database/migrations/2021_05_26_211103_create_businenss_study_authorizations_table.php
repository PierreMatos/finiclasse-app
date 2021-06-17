<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinenssStudyAuthorizationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businenss_study_authorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('min');
            $table->integer('max');
            $table->integer('responsible_id')->unsigned();
            $table->string('color');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('responsible_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('businenss_study_authorizations');
    }
}