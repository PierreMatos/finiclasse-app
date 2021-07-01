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
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->integer('price')->nullable();
            $table->integer('pos_number')->nullable();
            $table->integer('prop_value')->nullable();
            $table->timestamp('first_contact_date')->nullable();
            $table->timestamp('last_contact_date')->nullable();
            $table->timestamp('next_contact_date')->nullable();
            $table->string('contract')->nullable();
            $table->boolean('test_drive')->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('business_study_id')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('vendor_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('proposal_states');
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
