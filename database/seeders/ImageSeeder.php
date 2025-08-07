<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for ($i = 1; $i <= 10; $i++) {

            Image::create([
                'name' =>   'user' . $i . '.jpg',
                'imageable_id' => $i,
                'imageable_type' =>  'App\Models\User',

            ]);

            Image::create([
                'name' =>   'blog' . $i . '.jpg',
                'imageable_id' => $i,
                'imageable_type' => 'App\Models\Blog',

            ]);
        }
    }
}
