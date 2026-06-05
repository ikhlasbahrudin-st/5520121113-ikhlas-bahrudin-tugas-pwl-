<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    public function index()
    {
        $search = request('search');
        $mahasiswas = Mahasiswa::when($search, function ($query) use ($search) {
            $query->where('nama_mahasiswa', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('prodi', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(MahasiswaRequest $request)
    {
        Mahasiswa::create($request->validated());
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('krs.mataKuliah');
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
