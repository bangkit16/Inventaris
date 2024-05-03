<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangModel>
 */
class BarangModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prices = [];
        for ($i = 100; $i <= 300; $i++) {
            $prices[] = $i * 100;
        }

        return [
            //
            'nama_barang' => fake()->unique()->randomElement([
                'Obeng', 'Tang', 'Gergaji', 'Bor', 'Kunci Inggris',
                'Kuas', 'Paku', 'Sekrup', 'Meteran', 'Pisau Kater',
                'Lem', 'Klem', 'Pita Isolasi', 'Kabel', 'Solder',
                'Kapak', 'Palu', 'Pahat', 'Benang Plastik', 'Gunting Besi'
            ] ),
            'harga' => fake()->randomElement($prices),
            'stok' => fake()->numberBetween(5, 20)
        ];
    }
}
