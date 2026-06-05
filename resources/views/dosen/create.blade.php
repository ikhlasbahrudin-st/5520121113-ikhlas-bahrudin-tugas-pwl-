@extends('layouts.app')
@section('title', 'Tambah Dosen')
@section('page-title', 'Tambah Dosen')

@section('content')
<div class="card animate-fade-in">
    <div class="card-body">
        <form action="{{ route('dosens.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}">
                @error('nidn')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen') }}">
                @error('nama_dosen')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
            <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
