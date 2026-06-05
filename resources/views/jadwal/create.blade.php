@extends('layouts.app')
@section('title', 'Tambah Jadwal')
@section('page-title', 'Tambah Jadwal')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card animate-fade-in">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-plus me-2"></i>Tambah Jadwal Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('jadwals.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dosen <span class="text-danger">*</span></label>
                            <select name="dosen_id" class="form-select @error('dosen_id') is-invalid @enderror">
                                <option value="">-- Pilih Dosen --</option>
                                @foreach($dosens as $dosen)
                                <option value="{{ $dosen->id }}" {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                            @error('dosen_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mata Kuliah <span class="text-danger">*</span></label>
                            <select name="mata_kuliah_id" class="form-select @error('mata_kuliah_id') is-invalid @enderror">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($matakuliahs as $mk)
                                <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>{{ $mk->kode_mk }} - {{ $mk->nama_mk }}</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Hari <span class="text-danger">*</span></label>
                            <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                                <option value="">-- Pilih Hari --</option>
                                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                @endforeach
                            </select>
                            @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}">
                            @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}">
                            @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ruangan <span class="text-danger">*</span></label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" value="{{ old('ruangan') }}" placeholder="Contoh: R101">
                        @error('ruangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
                        <a href="{{ route('jadwals.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
