<?php

namespace Database\Seeders;

use App\Models\CategoryCommunity;
use App\Models\CategoryProject;
use App\Models\Community;
use App\Models\Project;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserCommunity;
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
        CategoryCommunity::factory(5)->create();
        Project::factory(10)->create();
        Community::factory(10)->create();
        Reward::factory(10)->create();
        UserCommunity::factory(100)->create();
    }
}
