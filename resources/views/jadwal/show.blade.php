@extends('layouts.app')
@section('title', 'Detail Jadwal')
@section('page-title', 'Detail Jadwal')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card animate-fade-in">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-week me-2"></i>Detail Jadwal</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-borderless">
                    <tr><th width="150">Mata Kuliah</th><td>: <span class="badge bg-primary">{{ $jadwal->mataKuliah->kode_mk }}</span> {{ $jadwal->mataKuliah->nama_mk }}</td></tr>
                    <tr><th>Dosen</th><td>: {{ $jadwal->dosen->nama_dosen }}</td></tr>
                    <tr><th>Hari</th><td>: <span class="badge bg-success">{{ $jadwal->hari }}</span></td></tr>
                    <tr><th>Jam</th><td>: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td></tr>
                    <tr><th>Ruangan</th><td>: <span class="badge bg-secondary">{{ $jadwal->ruangan }}</span></td></tr>
                    <tr><th>SKS</th><td>: {{ $jadwal->mataKuliah->sks }} SKS</td></tr>
                </table>
                <a href="{{ route('jadwals.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
