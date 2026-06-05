@extends('layouts.app')
@section('title', 'Edit Mata Kuliah')
@section('page-title', 'Edit Mata Kuliah')

@section('content')
<div class="row justify-content-center animate-fade-in">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                <h5 class="mb-1 fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-pencil-square text-primary"></i> Edit Data Mata Kuliah
                </h5>
                <p class="text-muted small mb-0">Ubah detail informasi data paket mata kuliah akademik.</p>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('mata-kuliahs.update', ['mata_kuliah' => $matakuliah->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider">Kode MK <span class="text-danger">*</span></label>
                            <input type="text" name="kode_mk" class="form-control rounded-3 custom-input @error('kode_mk') is-invalid @enderror" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" placeholder="Contoh: MK001">
                            @error('kode_mk')
                                <div class="invalid-feedback small fw-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider">Nama Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_mk" class="form-control rounded-3 custom-input @error('nama_mk') is-invalid @enderror" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" placeholder="Masukkan nama mata kuliah">
                            @error('nama_mk')
                                <div class="invalid-feedback small fw-medium">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider">Bobot SKS <span class="text-danger">*</span></label>
                            <input type="number" name="sks" class="form-control rounded-3 custom-input @error('sks') is-invalid @enderror" value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6" placeholder="Rentang 1 - 6">
                            @error('sks')
                                <div class="invalid-feedback small fw-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider">Semester <span class="text-danger">*</span></label>
                            <input type="number" name="semester" class="form-control rounded-3 custom-input @error('semester') is-invalid @enderror" value="{{ old('semester', $matakuliah->semester) }}" min="1" max="14" placeholder="Rentang 1 - 14">
                            @error('semester')
                                <div class="invalid-feedback small fw-medium">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2 pt-2 border-top">
                        <button type="submit" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm btn-save-hover">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                        
                        <a href="{{ route('mata-kuliahs.index') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2 btn-back-hover">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Spasi Atribut Judul Label */
    .tracking-wider {
        letter-spacing: 0.05em;
        font-size: 0.72rem !important;
    }

    /* Kustomisasi Input Form agar Lebih Halus */
    .custom-input {
        border-color: #e3e6f0;
        padding: 0.6rem 0.75rem;
        color: #333;
        transition: all 0.2s ease-in-out;
    }
    .custom-input:focus {
        border-color: #86b7fe !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15) !important;
    }
    .custom-input.is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15) !important;
    }

    /* Efek Hover Tombol */
    .btn-save-hover {
        transition: all 0.2s ease;
    }
    .btn-save-hover:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2) !important;
    }
    
    .btn-back-hover {
        transition: all 0.2s ease;
    }
    .btn-back-hover:hover {
        background-color: #f8f9fa;
        color: #212529;
        transform: translateX(-2px);
    }
</style>
@endsection