<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankPassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_passes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->double('amount');
            $table->date('application_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('credit_card_id')->nullable();
            $table->foreign('credit_card_id')->references('id')
                ->on('credit_cards');

            $table->unsignedBigInteger('bank_loan_id');
            $table->foreign('bank_loan_id')->references('id')
                ->on('bank_loans');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')
                ->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_passes');
    }
}
