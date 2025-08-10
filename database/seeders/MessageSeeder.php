<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert(
            [
                [
                    'name' => 'Huzaifa',
                    'email' => 'huzaifa@gmail.com',
                    'subject' => 'Need a project on laravel',
                    'description' => 'I need a laravel project of personel portfolio website , wiht the requirements , their is list of requirements',
                    'status' => '0',
                ],
                [
                    'name' => 'Zain chuimui',
                    'email' => 'zaini@gmail.com',
                    'subject' => 'need an oil job',
                    'description' => 'I have oil , can u grant me job at ur palce',
                    'status' => '1',
                ],
            ]
            );
    }
}
