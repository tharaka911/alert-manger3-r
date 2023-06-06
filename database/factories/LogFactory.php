<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "project_id" => $this->faker->numberBetween(1, 10),
            "severity_level" => $this->faker->numberBetween(1, 4),
            "msg_content" => $this->faker->words(20, true)
        ];
    }
}
