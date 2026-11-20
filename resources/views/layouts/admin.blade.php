<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') — DENIMORA Admin</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --admin-sidebar-bg: #0f172a;
            --admin-sidebar-hover: #1e293b;
            --admin-accent: #38bdf8;
            --admin-primary: #1e3a8a;
            --admin-bg: #f1f5f9;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--admin-bg);
            color: #1e293b;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background-color: var(--admin-sidebar-bg);
            min-height: 100vh;
            color: #94a3b8;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .admin-sidebar .nav-link {
            color: #cbd5e1;
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            margin: 0.2rem 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s ease;
        }

        .admin-sidebar .nav-link:hover {
            color: #ffffff;
            background-color: var(--admin-sidebar-hover);
        }

        .admin-sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .admin-content-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-main-body {
            padding: 1.75rem;
            flex: 1;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .table-admin {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .table-admin th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-admin td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: -260px;
            }
            .admin-sidebar.show {
                margin-left: 0;
            }
            .admin-content-wrapper {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar d-flex flex-column" id="adminSidebar">
        <div class="p-3 border-bottom border-secondary border-opacity-25">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <img src="{{ asset('images/denimora-logo.svg') }}" alt="DENIMORA Admin" height="34">
            </a>
            <div class="mt-2 text-xs text-secondary small px-1">
                <span class="badge bg-primary bg-opacity-25 text-info">Admin Control Center</span>
            </div>
        </div>

        <div class="py-3 flex-grow-1">
            <div class="px-3 pb-2 text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">
                Menu Utama
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam fs-5"></i>
                        <span>Produk Denim</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags fs-5"></i>
                        <span>Kategori</span>
                    </a>
                </li>
            </ul>

            <div class="px-3 pt-4 pb-2 text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">
                Frontend
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-info">
                        <i class="bi bi-box-arrow-up-right fs-5"></i>
                        <span>Lihat Website</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-3 border-top border-secondary border-opacity-25 small text-secondary">
            <div><strong>PT RYD Denim</strong></div>
            <div style="font-size: 0.75rem;">Laravel 12 & MySQL</div>
        </div>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="admin-content-wrapper">
        <!-- TOPBAR -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1 shadow-sm">
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah Produk</span>
                </a>
                <div class="vr mx-1"></div>
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px;">
                        AD
                    </div>
                    <div class="d-none d-md-block">
                        <div class="fw-semibold small leading-tight">Admin DENIMORA</div>
                        <div class="text-secondary" style="font-size: 0.75rem;">PT RYD Denim</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN BODY -->
        <main class="admin-main-body">
            <!-- FLASH MESSAGES -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>{{ session('warning') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-x-circle-fill fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2 fw-bold mb-2">
                        <i class="bi bi-exclamation-octagon-fill fs-5"></i>
                        <span>Terdapat kesalahan pengisian data:</span>
                    </div>
                    <ul class="mb-0 ps-4 small">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
