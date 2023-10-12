<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donate');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('adress_op');
            $table->string('phone');
            $table->string('city');
            $table->string('employer');
            $table->string('country');
            $table->string('occupation');
            $table->string('state');
            $table->string('email');
            $table->string('postal');
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
        Schema::dropIfExists('donations');
    }
}
