<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('product_id');
            $table->string('batch_id');
            $table->string('date');
            $table->string('transaction');
            $table->float('quantity');
            $table->integer('unit_id');
            $table->float('cost_price');
            $table->float('selling_price')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('added_by');
            $table->boolean('verify')->default(0);
            $table->string('verified_by')->nullable();
            $table->string('verified_date')->nullable();
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
        Schema::dropIfExists('product_transactions');
    }
}
