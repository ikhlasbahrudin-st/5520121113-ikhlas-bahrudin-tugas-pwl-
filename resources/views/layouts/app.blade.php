<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIAKAD') - Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-bg: #1e1e2d;
            --sidebar-hover: #2a2a3d;
            --sidebar-active: #3a3a5c;
            --body-bg: #f0f2f5;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--body-bg);
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 1.5rem;
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-brand h4 {
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-brand small {
            color: #8e8ea0;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .menu-label {
            padding: 0.75rem 1.5rem 0.5rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #6c6c80;
            font-weight: 600;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.7rem 1.5rem;
            color: #b0b0c0;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background: var(--sidebar-hover);
            color: #fff;
            border-left-color: #667eea;
        }

        .sidebar-menu a.active {
            background: var(--sidebar-active);
            color: #fff;
            border-left-color: #667eea;
        }

        .sidebar-menu a i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Navbar */
        .top-navbar {
            background: #fff;
            padding: 0.8rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .top-navbar .page-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .content-wrapper {
            padding: 2rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
        }

        /* Stat Cards */
        .stat-card {
            border-radius: 16px;
            padding: 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .stat-card .stat-icon {
            font-size: 2.5rem;
            opacity: 0.3;
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
        }

        .stat-card .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Table */
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            border-bottom-width: 1px;
        }

        .table td {
            vertical-align: middle;
            font-size: 0.9rem;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Form */
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        .form-label {
            font-weight: 500;
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 0.4rem;
        }

        /* Search */
        .search-box {
            position: relative;
        }

        .search-box .form-control {
            padding-left: 2.5rem;
        }

        .search-box .search-icon {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        /* Badge */
        .badge {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.4em 0.8em;
        }

        /* Pagination */
        .pagination .page-link {
            border-radius: 8px;
            margin: 0 2px;
            border: none;
            color: #667eea;
            font-size: 0.85rem;
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-gradient);
            border: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        .animate-fade-in:nth-child(1) { animation-delay: 0s; }
        .animate-fade-in:nth-child(2) { animation-delay: 0.1s; }
        .animate-fade-in:nth-child(3) { animation-delay: 0.2s; }
        .animate-fade-in:nth-child(4) { animation-delay: 0.3s; }
        .animate-fade-in:nth-child(5) { animation-delay: 0.4s; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-mortarboard-fill"></i> SIAKAD</h4>
            <small>Sistem Informasi Akademik</small>
        </div>
        <div class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="menu-label">Master Data</div>
            <a href="{{ route('dosens.index') }}" class="{{ request()->routeIs('dosens.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Dosen
            </a>
            <a href="{{ route('mahasiswas.index') }}" class="{{ request()->routeIs('mahasiswas.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Mahasiswa
            </a>
            <a href="{{ route('mata-kuliahs.index') }}" class="{{ request()->routeIs('mata-kuliahs.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Mata Kuliah
            </a>

            <div class="menu-label">Akademik</div>
            <a href="{{ route('jadwals.index') }}" class="{{ request()->routeIs('jadwals.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-week"></i> Jadwal
            </a>
            <a href="{{ route('krs.index') }}" class="{{ request()->routeIs('krs.*') ? 'active' : '' }}">
                <i class="bi bi-journal-check"></i> KRS
            </a>

            <div class="menu-label">Akun</div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-navbar">
            <div>
                <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="bi bi-list"></i>
                </button>
                <span class="page-title ms-2">@yield('page-title', 'Dashboard')</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="text-muted me-3"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</span>
            </div>
        </div>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert for flash messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'Validasi Gagal!',
                html: '<ul class="text-start">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                showConfirmButton: true
            });
        @endif

        // Delete confirmation
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74c3c',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
