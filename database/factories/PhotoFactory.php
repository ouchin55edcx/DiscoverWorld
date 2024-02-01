<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Adventure;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'storage/images/about1.png',
            'adventure_id' => function () {
                return Adventure::factory()->create()->id;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
