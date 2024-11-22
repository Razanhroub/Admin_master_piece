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
        Schema::table('users', function (Blueprint $table) {
            // Adding new fields with proper defaults or nullability
            $table->string('last_name')->nullable(); // Set last_name as nullable
            $table->string('phone_number', 15)->nullable(); // Set phone_number as nullable
            $table->text('address')->nullable(); // Set address as nullable
            $table->date('birth_of_date')->nullable(); // Set birth_of_date as nullable
            $table->tinyInteger('is_deleted')->default(0); // Keep is_deleted with default value of 0
            $table->enum('role', ['admin', 'user'])->default('admin'); // Keep role with default value of 'user'
            $table->string('profile_picture')->nullable(); // Set profile_picture as nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the new fields
            $table->dropColumn([
                'last_name',
                'phone_number',
                'address',
                'birth_of_date',
                'is_deleted',
                'role',
                'profile_picture'
            ]);
        });
    }
};
