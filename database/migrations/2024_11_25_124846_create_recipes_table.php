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
            $table->bigIncrements('recipe_id');
            $table->unsignedBigInteger('blog_id')->index('recipes_blog_id_foreign');
            $table->unsignedBigInteger('sub_category_id')->nullable()->index('recipes_sub_category_id_foreign');
            $table->unsignedBigInteger('ingredient_id')->index('recipes_ingredient_id_foreign');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('recipe_name');
            $table->text('instructions');
            $table->timestamps();
            $table->tinyInteger('is_deleted')->default(0);
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
