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
        Schema::create('saveforlaters', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blog_id')->references('blog_id')->on('blogs');
            $table->unique(['user_id', 'blog_id']);
            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saveforlaters');
    }
};
