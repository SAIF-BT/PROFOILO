<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->insert([
                [
                    "institution" => "Germany University",
                    "period" => "2010-2012",
                    "degree" => "BS Software",
                    "department" => "Computer ",
                ],
                [
                    "institution" => "APSACS",
                    "period" => "2022-2024",
                    "degree" => "Ics",
                    "department" => "Computer",
                ],
                [
                    "institution" => "Govt",
                    "period" => "2020-2022",
                    "degree" => "Matric",
                    "department" => "Bio ",
                ]
            ]
        );
    }
}
