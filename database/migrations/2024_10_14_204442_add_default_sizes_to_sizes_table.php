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

                  // Insert default sizes
                  DB::table('sizes')->insert([
                    ['name' => 'Small'],
                    ['name' => 'Medium'],
                    ['name' => 'Large'],
                ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sizes', function (Blueprint $table) {
      // Remove default sizes if necessary
      DB::table('sizes')->whereIn('name', ['Small', 'Medium', 'Large'])->delete();
        });
    }
};
