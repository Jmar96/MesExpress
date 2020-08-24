<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_histories', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_id');
            $table->string('status_id');
            $table->string('merchant_id');

            $table->integer('history_int01')->nullable()->unsigned()->default('0');
            $table->integer('history_int02')->nullable()->unsigned()->default('0');
            $table->integer('history_int03')->nullable()->unsigned()->default('0');
            $table->integer('history_int04')->nullable()->unsigned()->default('0');
            $table->integer('history_int05')->nullable()->unsigned()->default('0');
            $table->integer('history_int06')->nullable()->unsigned()->default('0');
            $table->string('history_string01')->nullable();
            $table->string('history_string02')->nullable();
            $table->string('history_string03')->nullable();
            $table->string('history_string04')->nullable();
            $table->string('history_string05')->nullable();
            $table->string('history_string06')->nullable();
            $table->string('history_string07')->nullable();
            $table->string('history_string08')->nullable();
            $table->string('history_string09')->nullable();
            $table->string('history_string10')->nullable();

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
        Schema::dropIfExists('parcel_histories');
    }
}
