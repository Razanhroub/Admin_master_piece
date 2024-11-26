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
        Schema::table('recipes', function (Blueprint $table) {
            $table->foreign(['blog_id'])->references(['blog_id'])->on('blogs')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ingredient_id'])->references(['ingredient_id'])->on('ingredients')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['sub_category_id'])->references(['subcategory_id'])->on('subcategories')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign('recipes_blog_id_foreign');
            $table->dropForeign('recipes_ingredient_id_foreign');
            $table->dropForeign('recipes_sub_category_id_foreign');
        });
    }
};
