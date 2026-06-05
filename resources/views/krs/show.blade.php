@extends('layouts.app')
@section('title', 'Detail KRS')
@section('page-title', 'Detail KRS')

@section('content')
<div class="card animate-fade-in">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-journal-check me-2"></i>Detail KRS Mahasiswa</h5>
        <a href="{{ route('krs.cetak', $kr) }}" class="btn btn-success"><i class="bi bi-file-pdf me-1"></i> Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr><th width="150">NIM</th><td>: <span class="badge bg-success">{{ $kr->mahasiswa->nim }}</span></td></tr>
                    <tr><th>Nama</th><td>: {{ $kr->mahasiswa->nama_mahasiswa }}</td></tr>
                    <tr><th>Prodi</th><td>: {{ $kr->mahasiswa->prodi }}</td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr><th width="150">Tahun Akademik</th><td>: {{ $kr->tahun_akademik }}</td></tr>
                    <tr><th>Semester</th><td>: Semester {{ $kr->semester }}</td></tr>
                    <tr><th>Total SKS</th><td>: <span class="badge bg-primary fs-6">{{ $totalSks }} SKS</span></td></tr>
                </table>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester MK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allKrs as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="badge bg-primary">{{ $item->mataKuliah->kode_mk }}</span></td>
                        <td>{{ $item->mataKuliah->nama_mk }}</td>
                        <td>{{ $item->mataKuliah->sks }}</td>
                        <td>Semester {{ $item->mataKuliah->semester }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold table-warning">
                        <td colspan="3" class="text-end">Total SKS:</td>
                        <td>{{ $totalSks }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="{{ route('krs.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>
</div>
@endsection
