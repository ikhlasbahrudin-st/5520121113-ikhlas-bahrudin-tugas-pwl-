@extends('layouts.app')
@section('title', 'Data Mata Kuliah')
@section('page-title', 'Data Mata Kuliah')

@section('content')
<div class="card border-0 shadow-sm rounded-4 animate-fade-in">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-4 px-4">
        <div>
            <h5 class="mb-1 fw-bold text-dark d-flex align-items-center gap-2">
                <i class="bi bi-book text-primary"></i> Manajemen Mata Kuliah
            </h5>
            <p class="text-muted small mb-0">Kelola informasi data paket kurikulum mata kuliah akademik.</p>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-1 border-end pe-3">
                @if($matakuliahs->onFirstPage())
                    <span class="btn btn-nav-arrow disabled" title="Sudah di halaman pertama">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $matakuliahs->appends(request()->input())->previousPageUrl() }}" class="btn btn-nav-arrow" title="Halaman Sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                @endif
                
                @if($matakuliahs->hasMorePages())
                    <a href="{{ $matakuliahs->appends(request()->input())->nextPageUrl() }}" class="btn btn-nav-arrow" title="Halaman Berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @else
                    <span class="btn btn-nav-arrow disabled" title="Sudah di halaman terakhir">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                @endif
            </div>

            <a href="{{ route('mata-kuliahs.create') }}" class="btn btn-primary rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm btn-create-hover">
                <i class="bi bi-plus-lg"></i> Tambah Mata Kuliah
            </a>
        </div>
    </div>

    <div class="card-body px-4 pb-4 pt-0">
        
        <form action="{{ route('mata-kuliahs.index') }}" method="GET" class="mb-4">
            <div class="row g-2">
                <div class="col-md-5 col-lg-4">
                    <div class="input-group search-container border rounded-3 overflow-hidden shadow-sm-none">
                        <span class="input-group-text bg-white border-0 pe-2 text-muted">
                            <i class="bi bi-search py-1"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-0 ps-1" placeholder="Cari kode atau nama mata kuliah..." value="{{ request('search') }}">
                        @if(request('search'))
                            <a href="{{ route('mata-kuliahs.index') }}" class="btn bg-transparent border-0 text-muted d-flex align-items-center px-2.5" title="Reset Pencarian">
                                <i class="bi bi-x-circle-fill small"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary rounded-3 px-3 w-100 fw-medium h-100 d-flex align-items-center justify-content-center gap-2">
                         Filter Data
                    </button>
                </div>
            </div>
        </form>

        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="py-3 px-3 border-bottom-0 text-uppercase tracking-wider small fw-bold" style="width: 70px;">No</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold" style="width: 140px;">Kode MK</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">Nama Mata Kuliah</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 120px;">Bobot SKS</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 130px;">Semester</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($matakuliahs as $index => $mk)
                    <tr>
                        <td class="px-3 fw-medium text-muted">{{ $matakuliahs->firstItem() + $index }}</td>
                        <td>
                            <span class="badge bg-light text-primary border border-primary-subtle px-2.5 py-1.5 fw-semibold font-monospace">
                                {{ $mk->kode_mk }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $mk->nama_mk }}</div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2.5 py-1.5 fw-bold">
                                {{ $mk->sks }} SKS
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary-subtle text-secondary-emphasis px-2.5 py-1.5 rounded-2 small fw-semibold">
                                Semester {{ $mk->semester }}
                            </span>
                        </td>
  <td class="text-center">
    <div class="d-flex justify-content-center gap-1">

        <a href="{{ route('mata-kuliahs.show', ['mata_kuliah' => $mk->id]) }}"
           class="btn btn-sm btn-icon-show rounded-2 text-info p-2"
           title="Detail Data">
            <i class="bi bi-eye fs-5 lh-1"></i>
        </a>

        <a href="{{ route('mata-kuliahs.edit', ['mata_kuliah' => $mk->id]) }}"
           class="btn btn-sm btn-icon-edit rounded-2 text-warning p-2"
           title="Edit Data">
            <i class="bi bi-pencil-square fs-5 lh-1"></i>
        </a>

        <form id="delete-form-{{ $mk->id }}"
              action="{{ route('mata-kuliahs.destroy', ['mata_kuliah' => $mk->id]) }}"
              method="POST"
              class="d-inline">
            @csrf
            @method('DELETE')

            <button type="button"
                    class="btn btn-sm btn-icon-delete rounded-2 text-danger p-2"
                    onclick="confirmDelete('delete-form-{{ $mk->id }}')"
                    title="Hapus Data">
                <i class="bi bi-trash3 fs-5 lh-1"></i>
            </button>
        </form>

    </div>
</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <div class="py-3">
                                <i class="bi bi-folder2-open display-4 text-black-50 mb-3 d-block"></i>
                                <span class="fw-medium">Mata kuliah tidak ditemukan atau belum terdaftar.</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($matakuliahs->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <span class="text-muted small">
                Menampilkan {{ $matakuliahs->firstItem() }} sampai {{ $matakuliahs->lastItem() }} dari {{ $matakuliahs->total() }} data
            </span>
            <div>
                {{ $matakuliahs->appends(request()->input())->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Spasi & Ukuran font Header Tabel */
    .tracking-wider {
        letter-spacing: 0.05em;
        font-size: 0.75rem !important;
    }

    /* Container Pencarian Baru */
    .search-container {
        border-color: #e3e6f0 !important;
        background-color: #fff;
        transition: all 0.2s ease-in-out;
    }
    .search-container:focus-within {
        border-color: #86b7fe !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .search-container input:focus {
        box-shadow: none !important;
        outline: none !important;
    }
    
    /* Efek Hover Tombol Tambah */
    .btn-create-hover {
        transition: all 0.2s ease;
    }
    .btn-create-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25) !important;
    }

    /* KUSTOMISASI UKURAN TOMBOL PANAH NAVIGASI KECIL & RAPI */
    .btn-nav-arrow {
        width: 32px;  
        height: 32px; 
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        border: 1px solid #e3e6f0;
        border-radius: 50% !important;
        color: #5a5c69;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        text-decoration: none;
    }
    
    .btn-nav-arrow i {
        font-size: 0.75rem !important; 
        line-height: 1 !important;
        -webkit-text-stroke: 0.5px; 
    }
    .btn-nav-arrow:hover:not(.disabled) {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: #ffffff;
    }
    .btn-nav-arrow.disabled {
        background-color: #f8f9fa;
        border-color: #eaecf4;
        color: #d1d3e2;
        cursor: not-allowed;
        opacity: 0.5;
    }

    /* Desain Tombol Aksi Minimalis Dalam Tabel */
    .btn-icon-show, .btn-icon-edit, .btn-icon-delete {
        background: transparent;
        border: none;
        transition: all 0.15s ease-in-out;
    }
    .btn-icon-show:hover {
        background-color: rgba(13, 110, 253, 0.12);
        color: #0d6efd !important;
    }
    .btn-icon-edit:hover {
        background-color: rgba(255, 193, 7, 0.12);
        color: #ffb700 !important;
    }
    .btn-icon-delete:hover {
        background-color: rgba(220, 53, 69, 0.12);
        color: #bb2d3b !important;
    }

    /* Style Pagination Default agar Selaras */
    .pagination {
        margin-bottom: 0;
        gap: 4px;
    }
    .page-item .page-link {
        border-radius: 6px !important;
        border: 1px solid #e3e6f0;
        color: #4e73df;
    }
    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
@endsection