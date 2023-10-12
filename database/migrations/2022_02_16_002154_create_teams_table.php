<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->longText('description');
            $table->string('photo');
            $table->string('location')->nullable();
            $table->string('designation')->nullable();
            $table->string('degree')->nullable();
            $table->string('language')->nullable();
            $table->string('experience')->nullable();
            $table->string('hobbies')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
