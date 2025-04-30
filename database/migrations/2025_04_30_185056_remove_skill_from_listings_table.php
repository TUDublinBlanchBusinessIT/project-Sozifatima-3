<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSkillFromListingsTable extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Only drop the old 'skill' column if it still exists
            if (Schema::hasColumn('listings', 'skill')) {
                $table->dropColumn('skill');
            }
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // If you ever roll this back, recreate the string column
            $table->string('skill')->after('id');
        });
    }
}
