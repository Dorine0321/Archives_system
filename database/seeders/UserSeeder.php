<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "elgenio",
            'email' => "rickentchabet@gmail.com",
            'email_verified_at' => now(),
            'password' => 'password',
        ]);

        User::create([
            'name' => "dorine",
            'email' => "dorine@gmail.com",
            'email_verified_at' => now(),
            'password' => 'password',
        ]);
        
    }
}
