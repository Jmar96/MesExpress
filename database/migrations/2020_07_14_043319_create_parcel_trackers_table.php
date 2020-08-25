<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_reference_number');
            $table->decimal('item_price',9,2);
            $table->decimal('item_weight',9,2);
            $table->string('item_payment_method')->nullable();
            $table->decimal('item_cod_ammount',9,2);
            $table->string('item_shipping_type')->nullable();
            $table->decimal('item_valuation_fee',9,2);
            $table->decimal('item_total_payment',9,2);
            $table->string('item_description')->nullable();
            $table->string('item_consignee_fullname');
            $table->string('item_consignee_bankaccount')->nullable();
            $table->string('item_consignee_contactno');
            $table->string('item_consignee_address');
            $table->string('item_consignee_pickup_address')->nullable();
            $table->string('item_consignee_notes')->nullable();
            $table->string('item_sender_fullname');
            $table->string('item_sender_contactno');
            $table->string('item_sender_address');
            $table->string('item_sender_notes')->nullable();

            $table->integer('item_merchant_id');
            $table->integer('item_rider_id')->nullable()->unsigned()->default('0');
            $table->string('item_status_id')->nullable()->default("1");
            $table->boolean('cancelled')->default(false);
            $table->boolean('completed')->default(false);
            $table->string('item_image')->nullable();

            $table->integer('item_int01')->nullable()->unsigned()->default('0');
            $table->integer('item_int02')->nullable()->unsigned()->default('0');
            $table->integer('item_int03')->nullable()->unsigned()->default('0');
            $table->integer('item_int04')->nullable()->unsigned()->default('0');
            $table->integer('item_int05')->nullable()->unsigned()->default('0');
            $table->integer('item_int06')->nullable()->unsigned()->default('0');
            $table->string('item_string01')->nullable();
            $table->string('item_string02')->nullable();
            $table->string('item_string03')->nullable();
            $table->string('item_string04')->nullable();
            $table->string('item_string05')->nullable();
            $table->string('item_string06')->nullable();
            $table->string('item_string07')->nullable();
            $table->string('item_string08')->nullable();
            $table->string('item_string09')->nullable();
            $table->string('item_string10')->nullable();

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
        Schema::dropIfExists('parcel_trackers');
    }
}
