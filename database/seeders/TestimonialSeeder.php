<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert(
            [
                [
                    'name' => 'Saif',
                    'function' => 'customer',
                    'testimony' => 'I got a very good impression',
                    'rating' => '4/5',
                    'image' => 'avatar.png',
                ],
                [
                    'name' => 'Jackie',
                    'function' => 'Client',
                    'testimony' => 'WOnderfull work in simpler way',
                    'rating' => '5/5',
                    'image' => 'avatar.png',
                ],
            ]
            );
    }
}
