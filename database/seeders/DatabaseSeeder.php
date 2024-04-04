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
        \App\Models\User::factory(15)->create();
        \App\Models\Category::factory(15)->create();
        \App\Models\Department::factory(15)->create();
        \App\Models\Document::factory(15)->create();
        \App\Models\Comment::factory(15)->create();
        \App\Models\Log::factory(15)->create();
    }
}
