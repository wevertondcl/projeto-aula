<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgendaDiaHorario>
 */
class AgendaDiaHorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'horario' => $this->faker->dateTime(),
            'disponibilidade' => $this->faker->boolean(),
        ];
    }
}
