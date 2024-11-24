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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');                    // Primary key for blogs table
            $table->unsignedBigInteger('user_id');     // Foreign key for users who create blogs
            $table->string('title');                   // Title of the blog
            $table->text('content')->nullable();       // Content of the blog (nullable)
            $table->string('image')->nullable();   // Image for the blog (nullable)
            $table->tinyInteger('accepted')->default(0)->comment('0 = not accepted, 1 = accepted');  // Use tinyInteger for 0 and 1 values
            $table->timestamps();                     // Created_at and updated_at timestamps
            $table->tinyInteger('is_deleted')->default(0);
            // Foreign key constraint to link with users table
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
