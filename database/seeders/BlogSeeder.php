<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        // DB::table('blogs')->truncate();

        // DB::table('blogs')->insert([
        //     'title' => 'Blog 1',
        //     'body' => 'Ini adalah deskripsi blog 1'
        // ]);


        Blog::factory(10)->create();
    }
}
