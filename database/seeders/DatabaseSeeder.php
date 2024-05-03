<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BarangModel;
use App\Models\LevelModel;
use App\Models\UserModel;
use App\Models\MahasiswaModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        LevelModel::create([
            'level_kode' => 'JRS',
            'level_nama' => 'Admin Jurusan JTI',
        ]);
        LevelModel::create([
            'level_kode' => 'ADM',
            'level_nama' => 'Administrator',
        ]);
        UserModel::create([
            'nama' => 'Lailatul Qodriyah',
            'username' => 'admin',
            'nip' => fake()->nik(),
            'id_level' => 1,
            'password' => '$2a$12$ADwIzkRUWW9DGkdctyxNtO3VYOG9KamKMBmGbg.joYGNwJAtb69vi',
        ]);
        UserModel::factory(4)->create();
        BarangModel::factory(15)->create();
        MahasiswaModel::factory(15)->create();
    }
}
