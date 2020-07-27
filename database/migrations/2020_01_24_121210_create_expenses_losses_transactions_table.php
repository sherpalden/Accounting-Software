<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesLossesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_losses_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creditors_id')->nullable();
            $table->string('date');
            $table->string('invoice_number')->nullable();
            $table->float('discount_percent');
            $table->float('tax_percent');
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
        Schema::dropIfExists('expenses_losses_transactions');
    }
}
