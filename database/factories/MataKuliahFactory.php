<?php
namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    protected $model = MataKuliah::class;

    public function definition(): array
    {
        $mataKuliah = [
            ['kode_mk' => 'IF101', 'nama_mk' => 'Algoritma dan Pemrograman', 'sks' => 3, 'semester' => 1],
            ['kode_mk' => 'IF102', 'nama_mk' => 'Matematika Diskrit', 'sks' => 3, 'semester' => 1],
            ['kode_mk' => 'IF201', 'nama_mk' => 'Struktur Data', 'sks' => 3, 'semester' => 2],
            ['kode_mk' => 'IF202', 'nama_mk' => 'Basis Data', 'sks' => 3, 'semester' => 2],
            ['kode_mk' => 'IF301', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester' => 3],
            ['kode_mk' => 'IF302', 'nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 3],
            ['kode_mk' => 'IF401', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 4],
            ['kode_mk' => 'IF402', 'nama_mk' => 'Sistem Operasi', 'sks' => 2, 'semester' => 4],
            ['kode_mk' => 'IF501', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 5],
            ['kode_mk' => 'IF502', 'nama_mk' => 'Pemrograman Mobile', 'sks' => 3, 'semester' => 5],
        ];

        $item = $this->faker->unique()->randomElement($mataKuliah);
        return $item;
    }
}
