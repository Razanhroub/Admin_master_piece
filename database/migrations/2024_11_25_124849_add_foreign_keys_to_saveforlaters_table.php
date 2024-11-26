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
        Schema::table('saveforlaters', function (Blueprint $table) {
            $table->foreign(['blog_id'])->references(['blog_id'])->on('blogs')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saveforlaters', function (Blueprint $table) {
            $table->dropForeign('saveforlaters_blog_id_foreign');
            $table->dropForeign('saveforlaters_user_id_foreign');
        });
    }
};
