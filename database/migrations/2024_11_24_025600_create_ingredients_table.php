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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id('ingredient_id');   // Primary key for ingredients table
            $table->string('ingredient_name');         // Name of the ingredient
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();          // Created_at and updated_at timestamps
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
