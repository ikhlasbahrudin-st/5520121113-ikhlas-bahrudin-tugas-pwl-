<?php
namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Http\Requests\JadwalRequest;

class JadwalController extends Controller
{
    public function index()
    {
        $search = request('search');
        $jadwals = Jadwal::with(['dosen', 'mataKuliah'])
            ->when($search, function ($query) use ($search) {
                $query->where('hari', 'like', "%{$search}%")
                      ->orWhere('ruangan', 'like', "%{$search}%")
                      ->orWhereHas('dosen', function ($q) use ($search) {
                          $q->where('nama_dosen', 'like', "%{$search}%");
                      })
                      ->orWhereHas('mataKuliah', function ($q) use ($search) {
                          $q->where('nama_mk', 'like', "%{$search}%");
                      });
            })->latest()->paginate(10)->withQueryString();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $dosens = Dosen::orderBy('nama_dosen')->get();
        $matakuliahs = MataKuliah::orderBy('nama_mk')->get();
        return view('jadwal.create', compact('dosens', 'matakuliahs'));
    }

    public function store(JadwalRequest $request)
    {
        Jadwal::create($request->validated());
        return redirect()->route('jadwals.index')->with('success', 'Data jadwal berhasil ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        $jadwal->load(['dosen', 'mataKuliah']);
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $dosens = Dosen::orderBy('nama_dosen')->get();
        $matakuliahs = MataKuliah::orderBy('nama_mk')->get();
        return view('jadwal.edit', compact('jadwal', 'dosens', 'matakuliahs'));
    }

    public function update(JadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->validated());
        return redirect()->route('jadwals.index')->with('success', 'Data jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Data jadwal berhasil dihapus!');
    }
}
