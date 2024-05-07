<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DendaModel>
 */
class DendaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id_pengembalian' => fake()->unique()->numberBetween(1,10),
            'keterangan' => fake()->sentence(),
        ];
    }
}
