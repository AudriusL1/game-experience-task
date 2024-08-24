<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform' => $this->faker->randomElement(['iOS', 'Android', 'Windows', 'macOS', 'Linux']),
            'version' => $this->faker->regexify('[0-9]\.[0-9]\.[0-9]'),
            'category' => $this->faker->randomElement(['bug', 'suggestion', 'praise', 'inquiry']),
            'content' => $this->faker->text(255),
        ];
    }
}
