<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for ($i = 1; $i <= 10; $i++) {

            Rating::create([
                'rating_value' =>  rand(1, 5),
                'ratingable_id' => $i,
                'ratingable_type' =>  'App\Models\Article',

            ]);

            Rating::create([
                'rating_value' =>   rand(1, 5),
                'ratingable_id' => $i,
                'ratingable_type' => 'App\Models\Blog',

            ]);
        }
    }
}
