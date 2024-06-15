<?php

namespace Database\Seeders;

use App\Models\CategoryProject;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(50)->create();
        CategoryProject::factory(5)->create();
        Project::factory(10)->create();
    }
}