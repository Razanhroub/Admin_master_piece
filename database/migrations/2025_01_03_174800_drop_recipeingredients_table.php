<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRecipeingredientsTable extends Migration
{
    public function up()
    {
        // Drop the table
        Schema::dropIfExists('recipeingredients');
    }

    public function down()
    {
        // Optionally, recreate the table structure
        Schema::create('recipeingredients', function (Blueprint $table) {
            $table->id(); // Assuming the table has an auto-incrementing primary key
            // Add the columns that were in the table
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();
        });
    }
}
