<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesReturnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_return_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('dealer_id');
            $table->string('description');
            $table->string('product_id');
            $table->integer('account_id');
            $table->float('quantity');
            $table->float('rate');
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
        Schema::dropIfExists('sales_return_transactions');
    }
}
