@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('page-title', 'Tambah Mahasiswa')

@section('content')
<div class="card animate-fade-in">
    <div class="card-body">
        <form action="{{ route('mahasiswas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                @error('nim')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" class="form-control @error('nama_mahasiswa') is-invalid @enderror" value="{{ old('nama_mahasiswa') }}">
                @error('nama_mahasiswa')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ old('prodi') }}">
                @error('prodi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}">
                @error('semester')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
