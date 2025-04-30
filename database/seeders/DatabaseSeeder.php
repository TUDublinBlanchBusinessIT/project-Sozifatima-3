<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure SkillSeeder is listed here
        $this->call([
            SkillSeeder::class,
        ]);
    }
}
