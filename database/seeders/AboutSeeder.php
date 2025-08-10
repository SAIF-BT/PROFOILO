<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert(
            [
                [
                    'name' => 'Huzaifa',
                    'home_image' => 'no-image.png',
                    'banner_image' => 'no-image.png',
                    'phone' => '03017788945',
                    'email' => 'Huzaifa@gmail.com',
                    'address' => 'Lahore',
                    'description' => 'Sayyadi Murshadi',
                    'summary' => 'Developer',
                    'tagline' => 'Murshadi',
                    'cv' => 'joedoe.pdf',
                    
                ],
            ],
        );
    }
}
