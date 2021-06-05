<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('biography')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('country_code',2)->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            
            $table->unsignedBigInteger('country_code_id');
            $table->unsignedBigInteger('user_id');       
            
            $table->foreign('country_code_id')->references('id')->on('country_codes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('profiles');
    }
}
