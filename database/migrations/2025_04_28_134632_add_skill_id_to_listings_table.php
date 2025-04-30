<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillIdToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            // Add skill_id as an unsigned big integer
            $table->unsignedBigInteger('skill_id');

            // Set the foreign key relationship with the 'skills' table
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            // Drop the foreign key and column when rolling back the migration
            $table->dropForeign(['skill_id']);
            $table->dropColumn('skill_id');
        });
    }
}
