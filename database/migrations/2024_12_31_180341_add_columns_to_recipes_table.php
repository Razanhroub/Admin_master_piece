<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->string('recipe_img')->nullable();
            $table->integer('calories')->nullable();
            $table->integer('ppl_number')->nullable();
            $table->string('oven_heat')->nullable(); // Store both value and unit
            $table->string('recipe_time')->nullable(); // Store both value and unit
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn(['recipe_img', 'calories', 'ppl_number', 'oven_heat', 'recipe_time']);
        });
    }
}