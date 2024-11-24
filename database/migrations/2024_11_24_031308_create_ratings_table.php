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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->integer('rating')->check('rating BETWEEN 1 AND 5');
            $table->timestamps();
            $table->tinyInteger('is_deleted')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blog_id')->references('blog_id')->on('blogs');
            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
