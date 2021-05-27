<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('vendor_id');
            $table->integer('price');
            $table->integer('pos_number');
            $table->integer('prop_value');
            $table->integer('financing_id');
            $table->integer('first_contact_date');
            $table->integer('last_contact_date');
            $table->integer('next_contact_date');
            $table->string('contract');
            $table->boolean('test_drive');
            $table->integer('state_id')->unsigned();
            $table->integer('business_study_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('car_states');
            $table->foreign('business_study_id')->references('id')->on('business_studies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proposals');
    }
}
