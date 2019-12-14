<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('curp');
            $table->string('rfc');
            $table->string('street');
            $table->string('in');
            $table->string('en');
            $table->string('desctription');
            $table->string('cp');
            $table->string('suburb');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
