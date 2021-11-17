<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('motorization')->nullable()->change();
            $table->decimal('price',13,2)->nullable()->change();
            $table->decimal('price_base',13,2)->nullable()->change();
            $table->decimal('price_new',13,2)->nullable()->change();
            $table->decimal('price_campaign',13,2)->nullable()->change();
            $table->decimal('tradein_purchase',13,2)->nullable()->change();
            $table->decimal('tradein_sale',13,2)->nullable()->change();
            $table->decimal('extras_total',13,2)->nullable()->change();
            $table->decimal('sub_total',13,2)->nullable()->change();
            $table->decimal('buying_price',13,2)->nullable()->change();
            $table->decimal('selling_price',13,2)->nullable()->change();
            $table->decimal('iva',13,2)->nullable()->change();
            $table->decimal('isv',13,2)->nullable()->change();
            $table->decimal('ptl',13,2)->nullable()->change();
            $table->decimal('sigpu',13,2)->nullable()->change();
            
            $table->string('observations')->nullable();
            $table->integer('est')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
