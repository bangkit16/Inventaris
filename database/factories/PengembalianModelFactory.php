<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengembalianModel>
 */
class PengembalianModelFactory extends Factory
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
            'id_peminjaman' => fake()->unique()->numberBetween(1,15),
            'tgl_kembali' => fake()->dateTimeBetween('+3 days', '+1 week'),
        ];
    }
}
