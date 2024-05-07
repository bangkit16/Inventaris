<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanModel>
 */
class PeminjamanModelFactory extends Factory
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

            'id_barang' => fake()->numberBetween(1, 15),
            'id_mahasiswa' => fake()->numberBetween(1, 15),
            'id_user' => fake()->numberBetween(2, 5),
            'tgl_pinjam' => fake()->dateTimeBetween('-1 week', '+3 days'),
            'tgl_tenggat' => fake()->dateTimeBetween('+3 days', '+1 week'),
            'jumlah' => fake()->numberBetween(1, 3),
        ];
    }
}
