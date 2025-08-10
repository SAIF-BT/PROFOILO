<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {         
        DB::table('projects')->insert(
            [
                [
                    'image' => 'no-image.png',
                    'title' => 'Google',
                    'description' => 'Google created successfully',
                    "link" => 'https://google.com'
                ],
                [
                    'image' => 'no-image.png',
                    'title' => 'instagram',
                    'description' => 'this is descriptions',
                    "link" => 'https://instagram.com'
                ],
            ]
            );
    }
}
