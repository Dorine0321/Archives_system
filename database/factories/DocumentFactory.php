<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 15),
            'title' => fake()->title(),
            'description' => fake()->sentence(),
            'file_path' => fake()->filePath(),
            'user_id' => fake()->numberBetween(1, User::count()),
            'type' => fake()->name(),
            'size' => fake()->numberBetween(1, 1000),
            'department_id' => fake()->numberBetween(1, Department::count()),
            'is_public' => fake()->boolean(),
            'is_archived' => fake()->boolean()
        ];
    }
}
