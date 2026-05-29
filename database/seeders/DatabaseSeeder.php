<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $users = User::factory(8)->create();

        Post::factory(5)->for($admin)->create();

        Post::factory(25)
            ->recycle($users)
            ->create()
            ->each(function (Post $post) use ($users): void {
                Comment::factory(rand(1, 6))
                    ->for($post)
                    ->recycle($users)
                    ->create();
            });
    }
}
