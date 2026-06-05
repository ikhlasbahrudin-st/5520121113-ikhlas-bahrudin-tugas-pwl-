@extends('layouts.app')
@section('title', 'Edit Dosen')
@section('page-title', 'Edit Dosen')

@section('content')
<div class="card animate-fade-in">
    <div class="card-body">
        <form action="{{ route('dosens.update', $dosen) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn', $dosen->nidn) }}">
                @error('nidn')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
                @error('nama_dosen')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $dosen->email) }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $dosen->no_hp) }}">
                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $dosen->alamat) }}">
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
