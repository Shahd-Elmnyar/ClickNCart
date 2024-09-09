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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('otp', 50)->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('locale')->default('en');
            $table->tinyInteger('is_admin')->default(0);
            $table->rememberToken();
            $table->foreignId('role_id')->default(2)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
