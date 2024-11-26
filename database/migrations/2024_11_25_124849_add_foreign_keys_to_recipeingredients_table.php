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
        Schema::table('recipeingredients', function (Blueprint $table) {
            $table->foreign(['ingredient_id'])->references(['ingredient_id'])->on('ingredients')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['recipe_id'])->references(['recipe_id'])->on('recipes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipeingredients', function (Blueprint $table) {
            $table->dropForeign('recipeingredients_ingredient_id_foreign');
            $table->dropForeign('recipeingredients_recipe_id_foreign');
        });
    }
};
