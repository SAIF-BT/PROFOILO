<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AboutSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\EducationSeeder;
use Database\Seeders\ExperienceSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\UserSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([AboutSeeder::class,MediaSeeder::class,ServiceSeeder::class,SkillSeeder::class,EducationSeeder::class,ExperienceSeeder::class,ProjectSeeder::class,TestimonialSeeder::class,MessageSeeder::class,UserSeeder::class]);
        
    }
}
