<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@siakad.com',
            'password' => bcrypt('password'),
        ]);

        // Create Dosen
        $dosens = Dosen::factory(15)->create();

        // Create Mahasiswa
        $mahasiswas = Mahasiswa::factory(30)->create();

        // Create Mata Kuliah (use specific data instead of factory to avoid unique issues)
        $mataKuliahData = [
            ['kode_mk' => 'IF101', 'nama_mk' => 'Algoritma dan Pemrograman', 'sks' => 3, 'semester' => 1],
            ['kode_mk' => 'IF102', 'nama_mk' => 'Matematika Diskrit', 'sks' => 3, 'semester' => 1],
            ['kode_mk' => 'IF103', 'nama_mk' => 'Pengantar Teknologi Informasi', 'sks' => 2, 'semester' => 1],
            ['kode_mk' => 'IF201', 'nama_mk' => 'Struktur Data', 'sks' => 3, 'semester' => 2],
            ['kode_mk' => 'IF202', 'nama_mk' => 'Basis Data', 'sks' => 3, 'semester' => 2],
            ['kode_mk' => 'IF301', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester' => 3],
            ['kode_mk' => 'IF302', 'nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 3],
            ['kode_mk' => 'IF401', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 4],
            ['kode_mk' => 'IF402', 'nama_mk' => 'Sistem Operasi', 'sks' => 2, 'semester' => 4],
            ['kode_mk' => 'IF501', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 5],
        ];

        $mataKuliahs = collect();
        foreach ($mataKuliahData as $mk) {
            $mataKuliahs->push(MataKuliah::create($mk));
        }

        // Create Jadwal
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jamList = ['07:00', '09:00', '10:00', '13:00', '14:00'];
        $ruanganList = ['R101', 'R102', 'R201', 'R202', 'R301', 'Lab-1', 'Lab-2'];

        foreach ($mataKuliahs as $index => $mk) {
            Jadwal::create([
                'dosen_id' => $dosens->random()->id,
                'mata_kuliah_id' => $mk->id,
                'hari' => $hariList[$index % count($hariList)],
                'jam_mulai' => $jamList[$index % count($jamList)],
                'jam_selesai' => date('H:i', strtotime($jamList[$index % count($jamList)] . ' +2 hours')),
                'ruangan' => $ruanganList[$index % count($ruanganList)],
            ]);
        }

        // Create KRS
        foreach ($mahasiswas->take(20) as $mhs) {
            $randomMks = $mataKuliahs->random(rand(3, 6));
            foreach ($randomMks as $mk) {
                Krs::create([
                    'mahasiswa_id' => $mhs->id,
                    'mata_kuliah_id' => $mk->id,
                    'tahun_akademik' => '2025/2026',
                    'semester' => $mhs->semester,
                ]);
            }
        }
    }
}
