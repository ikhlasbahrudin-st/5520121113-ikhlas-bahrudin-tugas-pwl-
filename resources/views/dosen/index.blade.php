@extends('layouts.app')
@section('title', 'Data Dosen')
@section('page-title', 'Data Dosen')

@section('content')
<div class="card border-0 shadow-sm rounded-4 animate-fade-in">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-4 px-4">
        <div>
            <h5 class="mb-1 fw-bold text-dark d-flex align-items-center gap-2">
                <i class="bi bi-person-workspace text-primary"></i> Manajemen Data Dosen
            </h5>
            <p class="text-muted small mb-0">Kelola informasi data induk dosen universitas.</p>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-1 border-end pe-3">
                @if($dosens->onFirstPage())
                    <span class="btn btn-nav-arrow disabled" title="Sudah di halaman pertama">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $dosens->previousPageUrl() }}" class="btn btn-nav-arrow" title="Halaman Sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                @endif
                
                @if($dosens->hasMorePages())
                    <a href="{{ $dosens->nextPageUrl() }}" class="btn btn-nav-arrow" title="Halaman Berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @else
                    <span class="btn btn-nav-arrow disabled" title="Sudah di halaman terakhir">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                @endif
            </div>

            <a href="{{ route('dosens.create') }}" class="btn btn-primary rounded-3 px-3 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm btn-create-hover">
                <i class="bi bi-plus-lg"></i> Tambah Dosen
            </a>
        </div>
    </div>

    <div class="card-body px-4 pb-4 pt-0">
        <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="py-3 px-3 border-bottom-0 text-uppercase tracking-wider small fw-bold" style="width: 70px;">No</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">NIDN</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">Nama Dosen</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">Email</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">No HP</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">Alamat</th>
                        <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($dosens as $index => $item)
                    <tr>
                        <td class="px-3 fw-medium text-muted">{{ $dosens->firstItem() + $index }}</td>
                        <td>
                            <span class="badge bg-light text-primary border border-primary-subtle px-2.5 py-1.5 fw-semibold font-monospace">
                                {{ $item->nidn }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $item->nama_dosen }}</div>
                        </td>
                        <td>
                            <span class="text-muted small"><i class="bi bi-envelope me-1 text-secondary"></i>{{ $item->email }}</span>
                        </td>
                        <td>
                            <span class="text-muted small"><i class="bi bi-phone me-1 text-secondary"></i>{{ $item->no_hp }}</span>
                        </td>
                        <td>
                            <span class="text-truncate d-inline-block text-muted" style="max-width: 200px;" title="{{ $item->alamat }}">
                                {{ $item->alamat }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('dosens.edit', $item) }}" class="btn btn-sm btn-icon-edit rounded-2 text-warning p-2" title="Edit Data">
                                    <i class="bi bi-pencil-square fs-5 lh-1"></i>
                                </a>
                                
                                <form id="delete-form-{{ $item->id }}" action="{{ route('dosens.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-icon-delete rounded-2 text-danger p-2" onclick="confirmDelete('delete-form-{{ $item->id }}')" title="Hapus Data">
                                        <i class="bi bi-trash3 fs-5 lh-1"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <div class="py-3">
                                <i class="bi bi-folder2-open display-4 text-black-50 mb-3 d-block"></i>
                                <span class="fw-medium">Belum ada data dosen terdaftar.</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    
    </div>
</div>

<style>
    /* Spasi & Ukuran font Header Tabel */
    .tracking-wider {
        letter-spacing: 0.05em;
        font-size: 0.75rem !important;
    }
    
    /* Efek Hover Tombol Tambah */
    .btn-create-hover {
        transition: all 0.2s ease;
    }
    .btn-create-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25) !important;
    }

    /* KUSTOMISASI UKURAN TOMBOL PANAH AGAR KECIL & RAPI */
    .btn-nav-arrow {
        width: 32px;  /* Mengecilkan ukuran lingkaran tombol */
        height: 32px; /* Mengecilkan ukuran lingkaran tombol */
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
    
    /* Mengunci ukuran ikon di dalam lingkaran agar tidak kebesaran */
    .btn-nav-arrow i {
        font-size: 0.75rem !important; /* Kekuatan utama: Ikon mengecil proporsional */
        line-height: 1 !important;
        -webkit-text-stroke: 0.5px; /* Memberikan ketegasan garis panah tipis */
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
    .btn-icon-edit, .btn-icon-delete {
        background: transparent;
        border: none;
        transition: all 0.15s ease-in-out;
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