<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipeingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->primary(['recipe_id', 'ingredient_id']);
            $table->tinyInteger('is_deleted')->default(0);
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes');
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipeingredients');
    }
};
