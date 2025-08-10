<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert(
            [
                [
                    'company' => 'Mustafai Tehreek',
                    'period' =>'2024-till now',
                    'position' => 'Developer',
                ],
                [
                    'company' => 'FBMP',
                    'period' =>'2023-2024',
                    'position' => 'VA',
                ],
            ]
            );
    }
}
