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
        Schema::table('categories', function (Blueprint $table) {
            // if (!Schema::hasColumn('categories', 'created_by')) {
                $table->foreignId('created_by')->nullable()->default(1)->constrained('users')->onDelete('cascade');
            // }

            // if (!Schema::hasColumn('categories', 'parent_id')) {
                $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // For subcategories
            // }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'created_by')) {
                $table->dropForeign(['created_by']); // Drop the foreign key constraint
                $table->dropColumn('created_by'); // Drop the column
            }

            if (Schema::hasColumn('categories', 'parent_id')) {
                $table->dropForeign(['parent_id']); // Drop foreign key for 'parent_id'
                $table->dropColumn('parent_id'); // Drop the column
            }
        });
    }
};
