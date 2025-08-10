<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert(
            [
                [
                    'name' => 'Ui/Ux developer',
                    'icon' => 'fab fa-web-grid',
                    'description' => 'I am a web designer and currently working on saif\'s personel portfolio website',
                ],
                [
                    'name' => 'Laravel developer',
                    'icon' => 'fab fa-laravel',
                    'description' => 'I am a laravel developer and currently working on saif\'s personel portfolio website',
                ],
            ]
            );
    }
}
