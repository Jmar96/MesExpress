<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('merchant_online_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('user_type')->default("merchant");
            $table->boolean('account_active')->default(true);
            $table->integer('user_level')->nullable()->unsigned()->default('1');
            $table->string('current_address')->nullable();
            
            $table->integer('user_int01')->nullable()->unsigned()->default('0');
            $table->integer('user_int02')->nullable()->unsigned()->default('0');
            $table->integer('user_int03')->nullable()->unsigned()->default('0');
            $table->integer('user_int04')->nullable()->unsigned()->default('0');
            $table->integer('user_int05')->nullable()->unsigned()->default('0');
            $table->integer('user_int06')->nullable()->unsigned()->default('0');
            $table->string('user_string01')->nullable();
            $table->string('user_string02')->nullable();
            $table->string('user_string03')->nullable();
            $table->string('user_string04')->nullable();
            $table->string('user_string05')->nullable();
            $table->string('user_string06')->nullable();
            $table->string('user_string07')->nullable();
            $table->string('user_string08')->nullable();
            $table->string('user_string09')->nullable();
            $table->string('user_string10')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
