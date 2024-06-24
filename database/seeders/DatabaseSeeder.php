<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)
      //  ->has(Post::factory(2))
        ->create();

        $posts= Post::factory(20)->recycle($users)->create();
        $comments = Comment::factory(20)->recycle($users)->recycle($posts)->create();

        User::factory()
        ->has(Post::factory(2))
        ->has(Comment::factory(20)->recycle($posts))
        ->create([
            'name' => 'Tahani',
            'email' => 'tahani@yahoo.com',
        ]);
    }
}
