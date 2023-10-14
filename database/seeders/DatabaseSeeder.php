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
             'name' => 'Thiago F. da Rosa',
             'email' => 'thyagogoth@gmail.com',
             'document' => '041.613.179-48',
             'password' => bcrypt('4n0n3ff3ct'),
         ]);

        \App\Models\Category::factory(50)->create();
        \App\Models\Post::factory(354)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
