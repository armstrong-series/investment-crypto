<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->integer('user_id');
            $table->float('amount', 8, 2)->nullable();
            $table->dateTime('txn_date')->nullable();
            $table->string('name');
            $table->string('txn_id')->nullable();
            $table->string('currency')->nullable();
            $table->enum('type', ['credit', 'debit']);
            $table->enum('status', ['pending', 'complete', 'failed']);
            $table->string('email')->unique();
            $table->string('phone-number')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('transaction');
    }
}
