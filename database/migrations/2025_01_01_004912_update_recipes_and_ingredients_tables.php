<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRecipesAndIngredientsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            // Drop the foreign key constraint on ingredient_id
            $table->dropForeign(['ingredient_id']); // Replace 'ingredient_id' with the exact foreign key column name if different
            $table->dropColumn('ingredient_id');   // Drop the column
        });

        Schema::table('ingredients', function (Blueprint $table) {
            // Add recipe_id as a foreign key
            $table->unsignedBigInteger('recipe_id');
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropForeign(['recipe_id']); // Drop the foreign key constraint
            $table->dropColumn('recipe_id');   // Drop the column
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id'); // Re-add the column
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('cascade'); // Re-add the foreign key
        });
    }
}
