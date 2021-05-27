<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancingProposalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financing_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('value');
            $table->string('document');
            $table->integer('financing_id')->unsigned();
            $table->integer('proposal_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('financing_id')->references('id')->on('financings');
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
        Schema::drop('financing_proposals');
    }
}
