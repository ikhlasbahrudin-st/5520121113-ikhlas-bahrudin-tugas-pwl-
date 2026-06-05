@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Header Section -->
<div class="row mb-5 align-items-center">
    <div class="col-12">
        <h3 class="fw-bold text-dark mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
        <p class="text-muted mb-0">Berikut ringkasan data dan aktivitas akademik terkini Anda.</p>
    </div>
</div>

<!-- Dashboard Stats Cards -->
<div class="row g-4">
    <!-- Card Total Dosen -->
    <div class="col-12 col-md-6 col-lg-4 animate-fade-in">
        <div class="card h-100 border-0 shadow-sm border-start border-primary border-4 py-2">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="text-muted fw-medium text-uppercase small d-block mb-1">Total Dosen</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalDosen }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                        <i class="bi bi-person-badge fs-3 lh-1"></i>
                    </div>
                </div>
                <div class="border-top pt-2">
                    <a href="{{ route('dosens.index') }}" class="text-primary text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-link">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Mahasiswa -->
    <div class="col-12 col-md-6 col-lg-4 animate-fade-in">
        <div class="card h-100 border-0 shadow-sm border-start border-success border-4 py-2">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="text-muted fw-medium text-uppercase small d-block mb-1">Total Mahasiswa</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalMahasiswa }}</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                        <i class="bi bi-people fs-3 lh-1"></i>
                    </div>
                </div>
                <div class="border-top pt-2">
                    <a href="{{ route('mahasiswas.index') }}" class="text-success text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-link">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Mata Kuliah -->
    <div class="col-12 col-md-6 col-lg-4 animate-fade-in">
        <div class="card h-100 border-0 shadow-sm border-start border-info border-4 py-2">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="text-muted fw-medium text-uppercase small d-block mb-1">Total Mata Kuliah</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalMataKuliah }}</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                        <i class="bi bi-book fs-3 lh-1"></i>
                    </div>
                </div>
                <div class="border-top pt-2">
                    <a href="{{ route('mata-kuliahs.index') }}" class="text-info text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-link">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Jadwal -->
    <div class="col-12 col-md-6 col-lg-4 animate-fade-in">
        <div class="card h-100 border-0 shadow-sm border-start border-warning border-4 py-2">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="text-muted fw-medium text-uppercase small d-block mb-1">Total Jadwal</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalJadwal }}</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                        <i class="bi bi-calendar-week fs-3 lh-1"></i>
                    </div>
                </div>
                <div class="border-top pt-2">
                    <a href="{{ route('jadwals.index') }}" class="text-warning text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-link">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total KRS -->
    <div class="col-12 col-md-6 col-lg-4 animate-fade-in">
        <div class="card h-100 border-0 shadow-sm border-start border-danger border-4 py-2">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex align-items-between justify-content-between mb-3">
                    <div>
                        <span class="text-muted fw-medium text-uppercase small d-block mb-1">Total KRS</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalKrs }}</h2>
                    </div>
                    <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3">
                        <i class="bi bi-journal-check fs-3 lh-1"></i>
                    </div>
                </div>
                <div class="border-top pt-2">
                    <a href="{{ route('krs.index') }}" class="text-danger text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-link">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style CSS Halus (Opsional, letakkan di file CSS utama Anda jika ada) -->
<style>
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.08)!important;
    }
    .hover-link i {
        transition: transform 0.2s ease;
    }
    .hover-link:hover i {
        transform: translateX(4px);
    }
</style>
@endsection