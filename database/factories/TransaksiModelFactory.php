<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiModel>
 */
class TransaksiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fieldToFill = fake()->randomElement(['barang_masuk', 'barang_keluar']);

        if ($fieldToFill === 'barang_masuk') {
            return [
                'id_barang' => fake()->numberBetween(1, 15),
                'id_user' => fake()->numberBetween(2, 4),
                'barang_masuk' => fake()->numberBetween(1, 5), // Isi dengan data acak untuk barang_masuk
                'barang_keluar' => null, // Biarkan barang_keluar kosong
                'tgl_transaksi' => fake()->dateTime($max = 'now'),
                'status' => fake()->randomElement(['baru', 'bekas', 'donasi', 'beli'])
            ];
        } else {
            return [
                'id_barang' => fake()->numberBetween(1, 15),
                'id_user' => fake()->numberBetween(2, 5),
                'barang_masuk' => null, // Biarkan barang_masuk kosong
                'barang_keluar' => fake()->numberBetween(1, 5), // Isi dengan data acak untuk barang_keluar
                'tgl_transaksi' => fake()->dateTime($max = 'now'),
                'status' => fake()->randomElement(['baru', 'bekas', 'donasi', 'beli'])
            ];
        }
    }
}
