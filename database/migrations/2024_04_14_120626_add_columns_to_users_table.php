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
               // Add isAdmin column
               $table->boolean('isAdmin')->default(false);

               // Add isVerified column
               $table->boolean('isVerified')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the columns if needed
            $table->dropColumn('isAdmin');
            $table->dropColumn('isVerified');
        });
    }
};
