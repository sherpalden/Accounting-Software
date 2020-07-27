<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('SupplierId')->unsigned();
            $table->string('SupplierId');
            // $table->foreign('SupplierId')
            //         ->references('id')->on('suppliers')
            //         ->onDelete('cascade');
            $table->string('date');
            $table->string('InvoiceNumber');
            $table->string('TotalPurchaseAmount')->nullable();
            $table->string('ExemptedPurchase')->nullable();
            $table->string('TaxablePurchase')->nullable();
            $table->string('TaxablePurchaseWithTax')->nullable();
            $table->string('ImportAmount')->nullable();
            $table->string('VATOnImport')->nullable();
            $table->string('CapitalPurchase')->nullable();
            $table->string('CapitalVAT')->nullable();
            $table->string('PaymentType');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
