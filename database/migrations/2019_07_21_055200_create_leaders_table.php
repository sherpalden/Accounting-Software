<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('citizenship_no')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('citizenship_photo')->unique();
            $table->string('profile_photo')->unique();
            $table->string('father_name');
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('generation_of')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('beneficiary_citizenship_no')->nullable();
            $table->string('beneficiary_relationship')->nullable();
            $table->string('beneficiary_citizenship_photo')->unique()->nullable();
            $table->string('pan_no')->unique()->nullable();
            $table->integer('verified_by')->default(0);
            $table->integer('added_by');
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
        Schema::dropIfExists('leaders');
    }
}
