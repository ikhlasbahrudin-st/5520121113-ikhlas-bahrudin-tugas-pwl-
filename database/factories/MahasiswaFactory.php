<?php
namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->numerify('##########'),
            'nama_mahasiswa' => $this->faker->name(),
            'prodi' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Manajemen', 'Akuntansi']),
            'semester' => $this->faker->numberBetween(1, 8),
            'email' => $this->faker->unique()->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
