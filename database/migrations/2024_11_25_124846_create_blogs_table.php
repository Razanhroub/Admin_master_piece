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
            $table->bigIncrements('blog_id');
            $table->unsignedBigInteger('user_id')->index('blogs_user_id_foreign');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('accepted')->default(0)->comment('0 = not accepted, 1 = accepted');
            $table->timestamps();
            $table->tinyInteger('is_deleted')->default(0);
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
