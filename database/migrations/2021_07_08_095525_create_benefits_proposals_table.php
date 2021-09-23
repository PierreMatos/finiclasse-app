<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsProposalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('benefit_id')->unsigned();
            $table->integer('proposal_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('value')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('benefit_id')->references('id')->on('benefits');
            $table->foreign('proposal_id')->references('id')->on('proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('benefits_proposals');
    }
}
