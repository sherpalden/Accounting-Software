<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('income_transaction_id');
            $table->integer('account_id');
            $table->float('amount');
            $table->float('discount');
            $table->string('receipt_mode');
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
        Schema::dropIfExists('income_receipts');
    }
}
