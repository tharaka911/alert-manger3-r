<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{

    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_name' => $this->faker->words(2, true),
            'user_id' => $this->faker->numberBetween(9, 11),
            'domain_name' => $this->faker->domainName,
            'project_api_key' => $this->faker->uuid,
            'key_generated_time' => $this->faker->dateTime(),
        ];
    }
}
