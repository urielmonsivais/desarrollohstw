<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->date('application_date');
            $table->integer('payment_deadline');
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')
                ->on('customers');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_loans');
    }
}
