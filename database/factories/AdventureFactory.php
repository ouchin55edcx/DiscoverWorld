<?php

namespace Database\Factories;
use App\Models\Destination;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdventureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'title' => $this->faker->sentence,
        'description' => $this->faker->paragraph,
        'tips' => $this->faker->sentence,
        'placeName' => $this->faker->city,
        'destination_id' => function () {
            return Destination::factory()->create()->id;
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
}
