<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(30)->recycle([
            Blog::all(),
        ])->create();
    }
}
