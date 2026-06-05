<?php
namespace Database\Factories;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class KrsFactory extends Factory
{
    protected $model = Krs::class;

    public function definition(): array
    {
        return [
            'mahasiswa_id' => Mahasiswa::factory(),
            'mata_kuliah_id' => MataKuliah::factory(),
            'tahun_akademik' => $this->faker->randomElement(['2024/2025', '2025/2026']),
            'semester' => $this->faker->numberBetween(1, 8),
        ];
    }
}
