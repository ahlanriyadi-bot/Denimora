@extends('layouts.app')

@section('title', 'Tentang Kami — DENIMORA | PT RYD Denim')

@section('content')
    <!-- HEADER -->
    <section class="py-5 bg-dark text-white text-center position-relative" style="background: linear-gradient(135deg, #0a1128 0%, #1e3a8a 100%);">
        <div class="container py-4 position-relative">
            <span class="badge bg-info bg-opacity-25 text-info px-3 py-1 rounded-pill fw-bold text-uppercase mb-3">Tentang Usaha</span>
            <h1 class="display-5 fw-bold mb-3">Mengenal Lebih Dekat DENIMORA</h1>
            <p class="lead text-light text-opacity-75 mx-auto" style="max-width: 650px;">
                Dedikasi UMKM lokal dalam menghadirkan fashion denim premium yang berkualitas tinggi, berkarakter, dan timeless.
            </p>
        </div>
    </section>

    <!-- PROFIL UTAMA & LOGO -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 text-center">
                    <div class="p-5 rounded-4 shadow-sm border bg-dark text-center">
                        <img src="{{ asset('images/denimora-logo.svg') }}" alt="DENIMORA Official Logo" class="img-fluid mb-4" style="max-height: 90px;">
                        <h4 class="fw-bold text-white mb-1">DENIMORA</h4>
                        <div class="text-info fw-semibold mb-2">PT RYD Denim</div>
                        <p class="text-secondary small fst-italic mb-3">"Wear Your Identity."</p>
                        <span class="badge bg-primary px-3 py-2 rounded-pill">UMKM Fashion Indonesia</span>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-light border small text-muted mb-3">
                        <i class="bi bi-building text-primary"></i> Profil Perusahaan
                    </div>
                    <h2 class="fw-bold text-dark mb-3">PT RYD Denim & Lahirnya Brand DENIMORA</h2>
                    <p class="text-secondary leading-relaxed mb-3">
                        <strong>DENIMORA</strong> merupakan unit usaha fashion yang bernaung di bawah <strong>PT RYD Denim</strong>. Berawal dari kecintaan mendalam terhadap material denim dan budaya craftsmanship lokal, kami didirikan untuk menjawab kebutuhan masyarakat modern akan pakaian berbahan denim yang tidak hanya tangguh dan tahan lama, tetapi juga nyaman digunakan sepanjang hari.
                    </p>
                    <p class="text-secondary leading-relaxed mb-4">
                        Kami merancang dan memproduksi berbagai jenis produk fashion denim seperti <em>classic & slim fit jeans</em>, <em>oversized jacket</em>, <em>vintage denim shirt</em>, serta <em>casual denim shorts</em>. Setiap potongan busana dikerjakan dengan standar pola anatomis tubuh Indonesia dan pemilihan grade benang terbaik.
                    </p>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light border">
                                <i class="bi bi-gem text-primary fs-3"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Material Terkurasi</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">100% Premium Cotton Denim</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light border">
                                <i class="bi bi-clock-history text-success fs-3"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Gaya Timeless</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">Tetap keren sepanjang masa</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI -->
    <section class="py-5" style="background-color: #f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Tujuan Kami</span>
                <h2 class="fw-bold text-dark">Visi & Misi Usaha</h2>
                <p class="text-muted">Landasan integritas dalam setiap helai denim yang kami persembahkan</p>
            </div>

            <div class="row g-4">
                <!-- VISI -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary text-white mb-4" style="width: 54px; height: 54px;">
                            <i class="bi bi-eye-fill fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Visi Perusahaan</h4>
                        <p class="text-secondary leading-relaxed mb-0">
                            Menjadi brand denim lokal pilihan utama masyarakat yang dikenal dengan kualitas standar internasional, inovasi desain modern yang timeless, dan komitmen berkelanjutan dalam memajukan industri garmen denim UMKM nasional.
                        </p>
                    </div>
                </div>

                <!-- MISI -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 bg-success text-white mb-4" style="width: 54px; height: 54px;">
                            <i class="bi bi-bullseye fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Misi Perusahaan</h4>
                        <ul class="text-secondary leading-relaxed mb-0 ps-3">
                            <li class="mb-2">Memproduksi produk pakaian denim berkualitas tinggi dengan bahan baku teruji dan teknik penjahitan rantai (chainstitch) yang kuat.</li>
                            <li class="mb-2">Menyajikan desain fashion yang inklusif, fungsional, dan relevan dengan tren kontemporer tanpa meninggalkan sentuhan klasik denim.</li>
                            <li class="mb-2">Memberikan pengalaman berbelanja terbaik, transparan, dan terpercaya bagi seluruh konsumen di seluruh Indonesia.</li>
                            <li>Memberdayakan tenaga kerja penjahit dan artisan lokal untuk bertumbuh bersama ekosistem PT RYD Denim.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INFORMASI MENGENAI PRODUK DENIM -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-warning bg-opacity-25 text-dark px-3 py-1 rounded-pill fw-bold text-uppercase mb-3">Denim Knowledge</span>
                    <h2 class="fw-bold text-dark mb-3">Kenapa Memilih Produk Denim DENIMORA?</h2>
                    <p class="text-secondary leading-relaxed mb-4">
                        Denim bukan sekadar pakaian biasa; denim adalah kanvas yang merekam aktivitas dan kepribadian pemiliknya. Setiap gesekan, lipatan, dan cucian menghasilkan karakter pudar (fading) yang sepenuhnya personal.
                    </p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3">
                            <div class="rounded-circle bg-light border p-2 text-primary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="bi bi-layers-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Ketebalan Ounce (oz) yang Tepat</h6>
                                <p class="small text-muted mb-0">Kami menyeimbangkan ketebalan 7.5 oz untuk kemeja sejuk, 12-13.5 oz untuk celana harian, dan 14-15 oz untuk jaket kokoh.</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="rounded-circle bg-light border p-2 text-primary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="bi bi-circle-square"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Pewarnaan Indigo Otentik</h6>
                                <p class="small text-muted mb-0">Rona biru denim pekat yang matang indah seiring bertambahnya usia pakai pakaian Anda.</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="rounded-circle bg-light border p-2 text-primary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Hardware Anti Karat</h6>
                                <p class="small text-muted mb-0">Kancing dan keling (rivet) berbahan tembaga paduan kuningan yang kokoh dan awet bertahun-tahun.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm" style="background: linear-gradient(135deg, #0f172a, #1e3a8a); color: white;">
                        <div class="p-5">
                            <div class="display-6 fw-bold text-white mb-3">Siap Menemukan Denim Terbaik Anda?</div>
                            <p class="text-light text-opacity-75 mb-4">
                                Telusuri katalog lengkap kami dan temukan pasangan celana, jaket, atau kemeja denim yang mewakili identitas Anda.
                            </p>
                            <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg px-4 rounded-pill fw-bold text-dark">
                                Lihat Seluruh Koleksi <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
