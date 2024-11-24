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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id('subcategory_id');
            $table->string('sub_category_name');
            $table->unsignedBigInteger('category_id'); // Define category_id as unsignedBigInteger
            $table->tinyInteger('is_deleted')->default(0);
            $table->foreign('category_id')->references('category_id')->on('categories'); // Use category_id from categories table
            $table->timestamps();
            $table->engine = 'InnoDB';

            

        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
