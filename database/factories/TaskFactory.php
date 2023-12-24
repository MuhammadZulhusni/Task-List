<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * TaskFactory
 * 
 * This factory class is responsible for defining the default state of the Task model
 * when creating test data using database seeding or model factories.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define the default attributes for the Task model
        return [
            'title' => fake()->sentence, // Generate a fake sentence for the title
            'description' => fake()->paragraph, // Generate a fake paragraph for the description
            'long_description' => fake()->paragraph(7, true), // Generate a longer fake paragraph for the long description
            'completed' => fake()->boolean // Generate a fake boolean value for the completion status
        ];
    }
}
