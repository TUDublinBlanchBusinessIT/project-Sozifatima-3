<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Wipe any existing rows so we don't get duplicates
        DB::table('skills')->truncate();

        // 2) Define your master list of skills
        $names = [
            'Web Development',
            'Graphic Design',
            'Data Analysis',
            'Marketing',
        ];

        // 3) Insert each one exactly once
        foreach ($names as $name) {
            Skill::create(['name' => $name]);
        }
    }
}
