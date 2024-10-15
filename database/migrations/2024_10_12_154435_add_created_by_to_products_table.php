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
        Schema::table('products', function (Blueprint $table) {
            // Check if the column exists
            if (Schema::hasColumn('products', 'created_by')) {
                // Modify the existing created_by column to be nullable
                $table->unsignedBigInteger('created_by')->nullable()->change();
            } else {
                // If it does not exist, create the column as nullable
                $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['created_by']);
            // Drop the created_by column if needed (optional)
            $table->dropColumn('created_by');
        });
    }
};
