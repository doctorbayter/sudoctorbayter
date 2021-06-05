<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_week', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('week_id');
            
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
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
        Schema::dropIfExists('day_week');
    }
}
