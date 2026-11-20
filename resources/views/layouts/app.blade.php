<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DENIMORA - UMKM Fashion Penjualan Denim Premium oleh PT RYD Denim. Wear Your Identity.">
    <title>@yield('title', 'DENIMORA — Wear Your Identity | Official Denim Store')</title>

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
            --denim-deep: #0a1128;
            --denim-dark: #0f172a;
            --denim-navy: #1e3a8a;
            --denim-blue: #2563eb;
            --denim-light-blue: #38bdf8;
            --denim-stitch: #f59e0b;
            --denim-stitch-light: #fbbf24;
            --denim-bg: #f8fafc;
            --denim-surface: #ffffff;
            --denim-border: #e2e8f0;
            --denim-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--denim-bg);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* Navbar Styling */
        .navbar-denim {
            background-color: rgba(10, 17, 40, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .navbar-brand-logo {
            height: 42px;
            width: auto;
        }

        .nav-link {
            font-weight: 500;
            color: #cbd5e1 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
            background-color: rgba(56, 189, 248, 0.12);
        }

        /* Custom Denim Buttons */
        .btn-denim {
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            border-radius: 8px;
            transition: all 0.25s ease;
        }

        .btn-denim:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 58, 138, 0.35);
        }

        .btn-denim-outline {
            background: transparent;
            color: var(--denim-navy);
            border: 2px solid var(--denim-navy);
            font-weight: 600;
            padding: 0.6rem 1.4rem;
            border-radius: 8px;
            transition: all 0.25s ease;
        }

        .btn-denim-outline:hover {
            background: var(--denim-navy);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(30, 58, 138, 0.2);
        }

        .btn-denim-light {
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--denim-dark);
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.25s ease;
        }

        .btn-denim-light:hover {
            background-color: #ffffff;
            color: var(--denim-navy);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Product Cards */
        .product-card {
            background: #ffffff;
            border: 1px solid var(--denim-border);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px rgba(15, 23, 42, 0.1);
            border-color: #cbd5e1;
        }

        .product-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 105%; /* 1:1.05 aspect ratio */
            overflow: hidden;
            background-color: #0f172a;
        }

        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        .product-badge-category {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(4px);
            color: #38bdf8;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid rgba(56, 189, 248, 0.3);
            text-transform: uppercase;
        }

        .product-badge-stock {
            position: absolute;
            bottom: 12px;
            right: 12px;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 6px;
        }

        .stock-available {
            background-color: rgba(16, 185, 129, 0.9);
            color: #ffffff;
        }

        .stock-low {
            background-color: rgba(245, 158, 11, 0.9);
            color: #ffffff;
        }

        .stock-out {
            background-color: rgba(239, 68, 68, 0.9);
            color: #ffffff;
        }

        /* Stitch Decoration */
        .stitch-line {
            border-bottom: 2px dashed var(--denim-stitch);
            opacity: 0.6;
        }

        /* Footer */
        .footer-denim {
            background-color: var(--denim-deep);
            color: #94a3b8;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            margin-top: auto;
        }

        .footer-denim a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-denim a:hover {
            color: #38bdf8;
        }

        .footer-brand-title {
            color: #ffffff;
            font-weight: 800;
            letter-spacing: 2px;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- NAVBAR DENIMORA -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-denim sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <img src="{{ asset('images/denimora-logo.svg') }}" alt="DENIMORA Logo" class="navbar-brand-logo">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            <i class="bi bi-grid me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="bi bi-info-circle me-1"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="bi bi-envelope me-1"></i> Contact
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm d-flex align-items-center gap-2 px-3 py-2 rounded-3">
                        <i class="bi bi-shield-lock-fill text-warning"></i>
                        <span>Admin Panel</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ALERT NOTIFICATIONS -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                <div>{{ session('warning') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                <i class="bi bi-x-circle-fill fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer-denim pt-5 pb-4">
        <div class="container">
            <div class="row g-4 pb-4">
                <!-- Kolom 1: Profil Brand -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="{{ asset('images/denimora-logo.svg') }}" alt="DENIMORA" height="38">
                    </div>
                    <p class="small text-secondary mb-3">
                        <strong>DENIMORA</strong> merupakan unit usaha fashion denim dari <strong>PT RYD Denim</strong>. Berkomitmen menghadirkan produk denim berkualitas tinggi dengan desain modern, nyaman digunakan, dan memiliki gaya timeless yang otentik.
                    </p>
                    <div class="d-flex align-items-center gap-2 text-warning small">
                        <i class="bi bi-stars"></i>
                        <span class="fst-italic">Tagline: "Wear Your Identity."</span>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1 text-primary"></i> Home</a></li>
                        <li><a href="{{ route('products.index') }}"><i class="bi bi-chevron-right me-1 text-primary"></i> Semua Produk</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1 text-primary"></i> Tentang Usaha</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-1 text-primary"></i> Kontak Kami</a></li>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Dashboard Admin</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kategori Produk -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Kategori Pilihan</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('products.index') }}?category=1"><i class="bi bi-tag-fill me-1 text-info"></i> Denim Jeans (Straight & Slim)</a></li>
                        <li><a href="{{ route('products.index') }}?category=2"><i class="bi bi-tag-fill me-1 text-info"></i> Jaket Denim & Trucker</a></li>
                        <li><a href="{{ route('products.index') }}?category=3"><i class="bi bi-tag-fill me-1 text-info"></i> Kemeja Denim Vintage</a></li>
                        <li><a href="{{ route('products.index') }}?category=4"><i class="bi bi-tag-fill me-1 text-info"></i> Celana Pendek Denim</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Info Kontak & Legalitas -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Kontak & Lokasi</h6>
                    <ul class="list-unstyled small text-secondary d-flex flex-column gap-2 mb-3">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-geo-alt-fill text-danger mt-1"></i>
                            <span>Jl. Denim Nusantara No. 88, Sentra Fashion Denim, Bandung, Jawa Barat 40115</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-envelope-fill text-primary"></i>
                            <span>info@denimora.co.id</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-whatsapp text-success"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                    </ul>
                    <!-- Social Media Links -->
                    <div class="d-flex gap-2">
                        <a href="https://instagram.com" target="_blank" class="btn btn-sm btn-outline-secondary text-white rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-instagram"></i></a>
                        <a href="https://tiktok.com" target="_blank" class="btn btn-sm btn-outline-secondary text-white rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-tiktok"></i></a>
                        <a href="https://facebook.com" target="_blank" class="btn btn-sm btn-outline-secondary text-white rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary opacity-25 my-3">

            <div class="row align-items-center small text-secondary">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; {{ date('Y') }} <strong>DENIMORA</strong> — PT RYD Denim. Seluruh Hak Cipta Dilindungi.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Tugas Kuliah Pemrograman Website Laravel 12 & MySQL
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
