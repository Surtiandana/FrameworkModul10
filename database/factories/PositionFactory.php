<?php

namespace Database\Factories;

use App\Models\Position; // Impor model Position
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    protected $models = Position::class; // Pastikan ini mengarah ke model yang benar

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->stateAbbr(),
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->sentence(),
        ];
    }
}
