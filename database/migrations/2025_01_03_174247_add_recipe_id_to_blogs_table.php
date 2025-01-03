<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecipeIdToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add the recipe_id column
            $table->unsignedBigInteger('recipe_id')->nullable();

            // Add the foreign key constraint
            $table->foreign('recipe_id')
                ->references('recipe_id')
                ->on('recipes');
                
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['recipe_id']);
            
            // Drop the recipe_id column
            $table->dropColumn('recipe_id');
        });
    }
}
