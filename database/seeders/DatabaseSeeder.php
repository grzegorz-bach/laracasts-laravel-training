<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'title' => 'Administrator',
            'password' => 'password',
            'is_admin' => true,
        ]);

        \App\Models\User::factory(3)->create();

        \App\Models\Category::factory(5)->create();

        \App\Models\Post::factory(30)->create();
    }
}
