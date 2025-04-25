<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add skills manually
        Skill::create(['name' => 'Web Development']);
        Skill::create(['name' => 'Graphic Design']);
        Skill::create(['name' => 'Data Analysis']);
        Skill::create(['name' => 'Marketing']);
    }
}
