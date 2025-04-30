<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillIdToListingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Only add the column if it doesn't already exist
            if (! Schema::hasColumn('listings', 'skill_id')) {
                $table->foreignId('skill_id')
                      ->after('id')
                      ->constrained()
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Only drop if it exists
            if (Schema::hasColumn('listings', 'skill_id')) {
                $table->dropForeign(['skill_id']);
                $table->dropColumn('skill_id');
            }
        });
    }
}
