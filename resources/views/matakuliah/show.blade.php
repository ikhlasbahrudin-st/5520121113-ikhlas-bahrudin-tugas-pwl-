@extends('layouts.app')
@section('title', 'Detail Mata Kuliah')
@section('page-title', 'Detail Mata Kuliah')

@section('content')
<div class="row g-4 animate-fade-in">
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                <h5 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-book text-primary"></i> Informasi Mata Kuliah
                </h5>
                <p class="text-muted small mb-0">Atribut data induk mata kuliah yang dipilih.</p>
            </div>
            
            <div class="card-body px-4 pb-4 pt-2 d-flex flex-column justify-content-between">
                <div class="mb-4">
                    <div class="py-3 border-bottom d-flex justify-content-between align-items-center">
                        <span class="text-secondary small fw-bold text-uppercase tracking-wider">Kode MK</span>
                        <span class="badge bg-light text-primary border border-primary-subtle px-2.5 py-1.5 fw-semibold font-monospace">
                            {{ $matakuliah->kode_mk ?? $matakuliah->kode ?? 'Tidak Ada Kode' }}
                        </span>
                    </div>
                    
                    <div class="py-3 border-bottom">
                        <span class="text-secondary d-block small fw-bold text-uppercase tracking-wider mb-1">Nama Mata Kuliah</span>
                        <span class="fw-bold text-dark fs-5">
                            {{ $matakuliah->nama_mk ?? $matakuliah->nama_matakuliah ?? $matakuliah->nama ?? 'Nama Tidak Terdeteksi' }}
                        </span>
                    </div>
                    
                    <div class="py-3 border-bottom d-flex justify-content-between align-items-center">
                        <span class="text-secondary small fw-bold text-uppercase tracking-wider">Bobot SKS</span>
                        <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2.5 py-1.5 fw-bold">
                            {{ $matakuliah->sks ?? 0 }} SKS
                        </span>
                    </div>
                    
                    <div class="py-3 border-bottom d-flex justify-content-between align-items-center">
                        <span class="text-secondary small fw-bold text-uppercase tracking-wider">Semester</span>
                        <span class="badge bg-secondary-subtle text-secondary-emphasis px-2.5 py-1.5 rounded-2 fw-semibold">
                            Semester {{ $matakuliah->semester ?? '-' }}
                        </span>
                    </div>
                </div>

                <a href="{{ route('mata-kuliahs.index') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center justify-content-center gap-2 align-self-start btn-back-hover">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                <h5 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-calendar-week text-primary"></i> Jadwal Perkuliahan
                </h5>
                <p class="text-muted small mb-0">Daftar kelas, dosen pengampu, dan alokasi ruangan.</p>
            </div>
            
            <div class="card-body px-4 pb-4 pt-2">
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="py-3 px-3 border-bottom-0 text-uppercase tracking-wider small fw-bold">Dosen Pengampu</th>
                                <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 100px;">Hari</th>
                                <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 150px;">Waktu</th>
                                <th class="py-3 border-bottom-0 text-uppercase tracking-wider small fw-bold text-center" style="width: 110px;">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @forelse($matakuliah->jadwals ?? $matakuliah->jadwal ?? [] as $jadwal)
                            <tr>
                                <td class="px-3">
                                    <div class="fw-semibold text-dark">{{ $jadwal->dosen->nama_dosen ?? 'Dosen Tidak Diketahui' }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="fw-medium text-dark small">{{ $jadwal->hari }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted small font-monospace">
                                        <i class="bi bi-clock me-1 text-secondary"></i>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-secondary border px-2.5 py-1.5 rounded-2 font-monospace small fw-medium">
                                        {{ $jadwal->ruangan }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <div class="py-2">
                                        <i class="bi bi-calendar-x display-5 text-black-50 mb-3 d-block"></i>
                                        <span class="fw-medium">Belum ada jadwal perkuliahan untuk mata kuliah ini.</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .tracking-wider {
        letter-spacing: 0.05em;
        font-size: 0.72rem !important;
    }
    .btn-back-hover {
        transition: all 0.2s ease;
    }
    .btn-back-hover:hover {
        background-color: #f8f9fa;
        color: #212529;
        transform: translateX(-2px);
    }
    @media (min-width: 992px) {
        .h-100 {
            height: 100% !important;
        }
    }
</style>
@endsection