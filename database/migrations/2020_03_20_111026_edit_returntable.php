<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditReturntable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_return_transactions', function (Blueprint $table) {
            $table->float('discount')->nullable()->after('rate');
            $table->float('tax')->nullable()->after('rate');
        });
        Schema::table('sales_return_transactions', function (Blueprint $table) {
            $table->float('discount')->nullable()->after('rate');
            $table->float('tax')->nullable()->after('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
