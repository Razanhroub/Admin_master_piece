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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('recipe_id');                    // Primary key for recipes table
            $table->unsignedBigInteger('blog_id');      // Foreign key for the blog related to the recipe
            $table->unsignedBigInteger('sub_category_id')->nullable(); // Foreign key for sub-category (nullable)
            $table->unsignedBigInteger('ingredient_id'); // Foreign key for the ingredient
            $table->enum('role', ['user', 'admin'])->default('user');  // Type of creator
            $table->string('recipe_name');              // Name of the recipe
            $table->text('instructions');               // Recipe instructions
            $table->timestamps();                      // Created_at and updated_at timestamps
            $table->tinyInteger('is_deleted')->default(0);
            // Foreign key constraint for linking to blogs table
            $table->foreign('blog_id')->references('blog_id')->on('blogs');
            // Foreign key constraint for linking to sub_categories table (nullable)
            $table->foreign('sub_category_id')->references('sub_category_id')->on('sub_categories');
            // Foreign key constraint for linking to ingredients table
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
