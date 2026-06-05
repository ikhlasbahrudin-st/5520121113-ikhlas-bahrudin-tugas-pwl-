<?php
namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDosen = Dosen::count();
        $totalMahasiswa = Mahasiswa::count();
        $totalMataKuliah = MataKuliah::count();
        $totalJadwal = Jadwal::count();
        $totalKrs = Krs::count();

        return view('dashboard', compact('totalDosen', 'totalMahasiswa', 'totalMataKuliah', 'totalJadwal', 'totalKrs'));
    }
}
