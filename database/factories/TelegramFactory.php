<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Telegram>
 */

class TelegramFactory extends Factory
{

    protected $telegram = Telegram::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => $this->faker->numberBetween(1, 10),
            'bot_api_key' => "6248662752:AAHJUog1kx2HQqBzcSvaxUAAHONMQQipJWc",
            'channel_id' => "-988576488",
        ];
    }
}
