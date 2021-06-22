<?php

use App\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_recipe', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('recipe_id');
            $table->enum('meal', [Recipe::DESAYUNO,Recipe::ALMUERZO,Recipe::CENA,Recipe::SNACK]);
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');

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
        Schema::dropIfExists('day_recipe');
    }
}
