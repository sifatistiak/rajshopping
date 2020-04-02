<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 100);
            $table->string('address', 100);
            $table->string('tran_id', 150)->nullable();
            $table->string('bank_tran_id', 150)->nullable();
            $table->float('amount');
            $table->float('store_amount');
            $table->string('currency', 20);
            $table->string('card_type', 150)->nullable();
            $table->string('card_no', 150)->nullable();
            $table->string('card_brand', 150)->nullable();
            $table->string('card_issuer_country', 150)->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
