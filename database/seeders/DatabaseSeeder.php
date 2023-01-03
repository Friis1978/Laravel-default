<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PostsTableSeeder::class);
        Post::factory(100)->create();

        // Post::factory(100)->create(['body' => 'Overriding the body of the posts']);
    }
}