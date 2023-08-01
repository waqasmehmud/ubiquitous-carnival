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
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id');
                $table->boolean('blocked')->default(false);
                $table->timestamp('blocked_at')->nullable();

                // Define foreign key constraint for role_id
                $table->foreign('role_id')->references('id')->on('roles');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['role_id', 'blocked', 'blocked_at']);
            });
        });
    }
};
