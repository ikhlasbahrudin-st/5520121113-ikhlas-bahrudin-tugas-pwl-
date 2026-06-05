<?php
namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;

    public function definition(): array
    {
        $jamMulai = $this->faker->randomElement(['07:00', '08:00', '09:00', '10:00', '13:00', '14:00', '15:00']);
        $jamSelesai = date('H:i', strtotime($jamMulai . ' +2 hours'));

        return [
            'dosen_id' => Dosen::factory(),
            'mata_kuliah_id' => MataKuliah::factory(),
            'hari' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'ruangan' => $this->faker->randomElement(['R101', 'R102', 'R201', 'R202', 'R301', 'Lab-1', 'Lab-2', 'Lab-3']),
        ];
    }
}
