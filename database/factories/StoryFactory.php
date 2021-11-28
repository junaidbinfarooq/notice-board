<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs) . '</p>',
            'approved' => $this->faker->boolean(),
        ];
    }
}
