<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaseWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fase_week', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fase_id');
            $table->unsignedBigInteger('week_id');
            
            $table->foreign('fase_id')->references('id')->on('fases')->onDelete('cascade');
            $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');

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
        Schema::dropIfExists('fase_week');
    }
}
