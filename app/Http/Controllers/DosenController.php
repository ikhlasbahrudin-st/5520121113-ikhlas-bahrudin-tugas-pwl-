<?php
namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Requests\DosenRequest;

class DosenController extends Controller
{
    public function index()
    {
        $search = request('search');
        $dosens = Dosen::when($search, function ($query) use ($search) {
            $query->where('nama_dosen', 'like', "%{$search}%")
                  ->orWhere('nidn', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(DosenRequest $request)
    {
        Dosen::create($request->validated());
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    public function show(Dosen $dosen)
    {
        $dosen->load('jadwals.mataKuliah');
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(DosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil dihapus!');
    }
}
