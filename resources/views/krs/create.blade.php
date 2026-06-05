@extends('layouts.app')
@section('title', 'Ambil Mata Kuliah')
@section('page-title', 'Ambil Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card animate-fade-in">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="bi bi-journal-plus me-2"></i>Ambil Mata Kuliah (KRS)</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('krs.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mahasiswa <span class="text-danger">*</span></label>
                            <select name="mahasiswa_id" class="form-select @error('mahasiswa_id') is-invalid @enderror">
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswas as $mhs)
                                <option value="{{ $mhs->id }}" {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}>{{ $mhs->nim }} - {{ $mhs->nama_mahasiswa }}</option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah_id" class="form-select @error('mata_kuliah_id') is-invalid @enderror">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($matakuliahs as $mk)
                                <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>{{ $mk->kode_mk }} - {{ $mk->nama_mk }} ({{ $mk->sks }} SKS)</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun Akademik <span class="text-danger">*</span></label>
                            <select name="tahun_akademik" class="form-select @error('tahun_akademik') is-invalid @enderror">
                                <option value="">-- Pilih Tahun Akademik --</option>
                                <option value="2024/2025" {{ old('tahun_akademik') == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                                <option value="2025/2026" {{ old('tahun_akademik') == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                <option value="2026/2027" {{ old('tahun_akademik') == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                            </select>
                            @error('tahun_akademik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Semester <span class="text-danger">*</span></label>
                            <input type="number" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}" min="1" max="14">
                            @error('semester')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan KRS</button>
                        <a href="{{ route('krs.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
