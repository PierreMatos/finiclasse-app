<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('city')->nullable();
            $table->string('adress')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('mobile_phone')->nullable();
            $table->integer('nif')->nullable();
            $table->timestamp('gdpr_confirmation')->nullable();
            $table->timestamp('gdpr_rejection')->nullable();
            $table->string('gdpr_type')->nullable();
            $table->boolean('finiclasse_employee')->nullable();
            $table->integer('stand_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('stand_id')->references('id')->on('stands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
