<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsToBusinessStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_studies', function (Blueprint $table) {
            //
            $table->float('ivatx')->nullable();
            $table->float('internal_costs')->nullable();
            $table->float('external_costs')->nullable();

            $table->decimal('extras_total',13,2)->nullable()->change();
            $table->decimal('sub_total',13,2)->nullable()->change();
            $table->decimal('total_benefits',13,2)->nullable()->change();
            $table->decimal('selling_price',13,2)->nullable()->change();
            $table->decimal('tradein_diff',13,2)->nullable()->change();
            $table->decimal('settle_amount',13,2)->nullable()->change();
            $table->decimal('total_discount_amount',13,2)->nullable()->change();
            $table->float('total_discount_perc')->nullable()->change();
            $table->decimal('iva',13,2)->nullable()->change();
            $table->decimal('isv',13,2)->nullable()->change();
            $table->decimal('ptl',13,2)->nullable()->change();
            $table->decimal('total_transf',13,2)->nullable()->change();
            $table->decimal('extras_total2',13,2)->nullable()->change();
            $table->decimal('total',13,2)->nullable()->change();
            $table->decimal('sale',13,2)->nullable()->change();
            $table->decimal('purchase_price',13,2)->nullable()->change();
            $table->decimal('expenses',13,2)->nullable()->change();
            $table->decimal('taxes',13,2)->nullable()->change();
            $table->decimal('warranty',13,2)->nullable()->change();
            $table->decimal('sigpu',13,2)->nullable()->change();
            $table->decimal('base_price',13,2)->nullable()->change();

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
