<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayFaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_fase', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fase_id');
            $table->unsignedBigInteger('day_id');
            
            $table->foreign('fase_id')->references('id')->on('fases')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

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
        Schema::dropIfExists('day_fase');
    }
}
