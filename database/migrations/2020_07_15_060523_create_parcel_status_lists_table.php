<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelStatusListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_status_lists', function (Blueprint $table) {
            $table->id();
            $table->string('item_status');
            $table->string('item_status_description');
            $table->string('item_status_group')->nullable();
            $table->string('item_status_group2')->nullable();

            $table->integer('status_int01')->nullable()->unsigned()->default('0');
            $table->integer('status_int02')->nullable()->unsigned()->default('0');
            $table->integer('status_int03')->nullable()->unsigned()->default('0');
            $table->integer('status_int04')->nullable()->unsigned()->default('0');
            $table->integer('status_int05')->nullable()->unsigned()->default('0');
            $table->integer('status_int06')->nullable()->unsigned()->default('0');
            $table->string('status_string01')->nullable();
            $table->string('status_string02')->nullable();
            $table->string('status_string03')->nullable();
            $table->string('status_string04')->nullable();
            $table->string('status_string05')->nullable();
            $table->string('status_string06')->nullable();
            $table->string('status_string07')->nullable();
            $table->string('status_string08')->nullable();
            $table->string('status_string09')->nullable();
            $table->string('status_string10')->nullable();

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
        Schema::dropIfExists('parcel_status_lists');
    }
}
