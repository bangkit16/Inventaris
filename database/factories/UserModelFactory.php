<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserModel>
 */
class UserModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'nip' => fake()->nik(),
            'id_level' => 2,
            'password' => '$2a$12$ADwIzkRUWW9DGkdctyxNtO3VYOG9KamKMBmGbg.joYGNwJAtb69vi', // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
