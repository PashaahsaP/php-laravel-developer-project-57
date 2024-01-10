<?php

namespace Database\Factories;

use App\Models\TaskStatus;
use App\Models\User;
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
        $status = TaskStatus::factory()->create();
        $user = User::factory()->create();
        return [
            'name' => fake()->text(15),
            'description'=>fake()->text(100),
            'status_id'=>$status->id,
            'author_id'=>$user->id
        ];
    }
}
