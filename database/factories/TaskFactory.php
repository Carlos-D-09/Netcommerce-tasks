<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
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
        return [
            'name' => fake()->name(),
            'description' => fake()->text(255),
            'is_completed' => false,
            'start_at' => fake()->dateTimeBetween('now','+1 week')->format('Y-m-d H:i:s'),
            'expired_at' => fake()->dateTimeBetween('+1 week', '+2 week')->format('Y-m-d H:i:s'),
            'user_id' => 1,
            'company_id' => 1
        ];
    }
}
