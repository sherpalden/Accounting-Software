<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesLossesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_losses_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expenses_transaction_id');
            $table->string('particulars');
            $table->float('quantity');
            $table->string('unit')->nullable();
            $table->float('rate');
            $table->integer('account_id');
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
        Schema::dropIfExists('expenses_losses_details');
    }
}
