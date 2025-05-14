<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = Category::factory(5)->create();
        $tags = Tag::factory(10)->create();

        Post::factory(10)
            ->hasAttached($tags->random(rand(2, 3)))
            ->create(['category_id' => $categories->random()->id]);
    }
}
