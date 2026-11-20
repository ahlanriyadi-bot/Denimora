@extends('layouts.app')

@section('title', 'DENIMORA — Wear Your Identity | E-Commerce Fashion Denim')

@section('content')
    <!-- HERO SECTION -->
    <section class="py-5" style="background: linear-gradient(135deg, #0a1128 0%, #102542 50%, #1b3a6b 100%); color: #ffffff; position: relative; overflow: hidden;">
        <!-- Background subtle decorative stitch -->
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10 pointer-events-none" style="background-image: radial-gradient(#38bdf8 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="container py-4 py-lg-5 position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background-color: rgba(56, 189, 248, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                        <i class="bi bi-patch-check-fill text-info"></i>
                        <span class="small fw-bold text-info text-uppercase tracking-wider">PT RYD Denim — UMKM Fashion Lokal</span>
                    </div>

                    <h1 class="display-4 fw-extrabold mb-3 text-white" style="letter-spacing: -1px; line-height: 1.15;">
                        Wear Your <span style="background: linear-gradient(90deg, #38bdf8, #818cf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Identity.</span>
                    </h1>

                    <p class="lead text-slate-300 mb-4" style="color: #cbd5e1; max-width: 580px;">
                        DENIMORA hadir menghadirkan koleksi pakaian denim premium dengan siluet modern, ketahanan material teruji, dan gaya timeless yang selalu relevan mengekspresikan karakter Anda.
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ route('products.index') }}" class="btn btn-denim btn-lg px-4 d-inline-flex align-items-center gap-2">
                            <span>Jelajahi Produk</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-4">
                            Tentang Kami
                        </a>
                    </div>

                    <!-- Trust Stats -->
                    <div class="row g-4 mt-4 pt-3 border-top border-secondary border-opacity-25">
                        <div class="col-auto">
                            <div class="h4 fw-bold text-white mb-0">{{ $totalProducts }}+</div>
                            <div class="small text-secondary">Produk Siap Kirim</div>
                        </div>
                        <div class="col-auto border-start border-secondary border-opacity-25 ps-4">
                            <div class="h4 fw-bold text-info mb-0">100%</div>
                            <div class="small text-secondary">Katun Denim Pilihan</div>
                        </div>
                        <div class="col-auto border-start border-secondary border-opacity-25 ps-4">
                            <div class="h4 fw-bold text-warning mb-0">4.9 / 5</div>
                            <div class="small text-secondary">Kepuasan Pelanggan</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('images/hero-denim.svg') }}" alt="DENIMORA Fashion Denim" class="img-fluid rounded-4 shadow-2xl" style="max-height: 480px; border: 1px solid rgba(255, 255, 255, 0.1);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN / VALUE PROPOSITIONS -->
    <section class="py-5 bg-white border-bottom border-light-subtle">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex align-items-start gap-3">
                        <div class="rounded-3 p-3 bg-primary bg-opacity-10 text-primary fs-3">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Bahan Premium</h6>
                            <p class="small text-muted mb-0">100% cotton denim mulai dari 7.5 oz hingga 15 oz selvedge.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="d-flex align-items-start gap-3">
                        <div class="rounded-3 p-3 bg-info bg-opacity-10 text-info fs-3">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Jahitan Kuat</h6>
                            <p class="small text-muted mb-0">Teknik chainstitch tahan lama untuk pemakaian harian intensif.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="d-flex align-items-start gap-3">
                        <div class="rounded-3 p-3 bg-warning bg-opacity-10 text-warning fs-3">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Garansi Tukar Size</h6>
                            <p class="small text-muted mb-0">Kebesaran atau kekecilan? Kami ganti ukuran tanpa ribet.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="d-flex align-items-start gap-3">
                        <div class="rounded-3 p-3 bg-success bg-opacity-10 text-success fs-3">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Pengiriman Cepat</h6>
                            <p class="small text-muted mb-0">Pengiriman terpercaya ke seluruh pelosok Nusantara.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KATEGORI PRODUK -->
    <section class="py-5" style="background-color: #f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Kategori Pilihan</span>
                <h2 class="fw-bold text-dark">Koleksi Denim Lengkap</h2>
                <p class="text-muted">Pilih kategori denim yang sesuai dengan gaya personal harian Anda</p>
            </div>

            <div class="row g-4">
                @forelse($categories as $category)
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center p-4 transition-all" style="transition: transform 0.25s ease;">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #1e3a8a, #2563eb); color: white;">
                                @if(stripos($category->name, 'jean') !== false)
                                    <i class="bi bi-columns fs-2"></i>
                                @elseif(stripos($category->name, 'jacket') !== false)
                                    <i class="bi bi-layers fs-2"></i>
                                @elseif(stripos($category->name, 'shirt') !== false)
                                    <i class="bi bi-file-earmark-person fs-2"></i>
                                @else
                                    <i class="bi bi-collection fs-2"></i>
                                @endif
                            </div>
                            <h5 class="fw-bold text-dark mb-1">{{ $category->name }}</h5>
                            <p class="small text-muted mb-3" style="min-height: 40px;">
                                {{ Str::limit($category->description, 60) }}
                            </p>
                            <div class="mt-auto">
                                <span class="badge bg-light text-primary border px-2 py-1 mb-3">
                                    {{ $category->products_count }} Produk
                                </span>
                                <div>
                                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 w-100">
                                        Lihat Kategori <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">Belum ada kategori terdaftar.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- PRODUK UNGGULAN -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-end justify-content-between mb-4 gap-3">
                <div>
                    <span class="badge bg-warning bg-opacity-25 text-dark px-3 py-1 rounded-pill fw-bold text-uppercase mb-2">Featured Products</span>
                    <h2 class="fw-bold text-dark mb-0">Produk Unggulan DENIMORA</h2>
                    <p class="text-muted mb-0">Rekomendasi terbaik yang paling diminati pecinta denim</p>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                    Lihat Semua Produk <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($featuredProducts as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img-wrapper">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img">
                                <span class="product-badge-category">
                                    {{ $product->category->name ?? 'Denim' }}
                                </span>
                                <span class="product-badge-stock {{ $product->stock > 5 ? 'stock-available' : ($product->stock > 0 ? 'stock-low' : 'stock-out') }}">
                                    {{ $product->stock > 0 ? 'Stok: ' . $product->stock : 'Habis' }}
                                </span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $product->name }}">
                                    {{ $product->name }}
                                </h6>
                                <p class="small text-muted mb-3 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 38px;">
                                    {{ $product->description }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                    <div>
                                        <div class="text-xs text-muted" style="font-size: 0.72rem;">HARGA</div>
                                        <div class="fw-bold text-primary fs-6">{{ $product->formatted_price }}</div>
                                    </div>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-denim px-3 py-1 rounded-pill">
                                        Detail <i class="bi bi-chevron-right ms-1 small"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="bi bi-box2 fs-1 d-block mb-2"></i>
                        Belum ada produk unggulan yang tersedia saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- BRAND STORY / ABOUT TEASER -->
    <section class="py-5" style="background-color: #0f172a; color: #ffffff;">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-info bg-opacity-20 text-info px-3 py-1 rounded-pill fw-bold text-uppercase mb-3">Tentang Usaha</span>
                    <h2 class="display-6 fw-bold mb-3">Lahir dari Keteguhan & Cinta Terhadap Kain Denim</h2>
                    <p class="text-secondary leading-relaxed mb-4">
                        <strong>DENIMORA</strong> berada di bawah naungan <strong>PT RYD Denim</strong>, sebuah usaha fashion yang berfokus menciptakan pakaian denim berdaya tahan tinggi, ramah kulit, dan memiliki potongan yang presisi. Kami meyakini bahwa pakaian denim bukan sekadar kain, melainkan cerminan identitas dan perjalanan hidup pemakainya.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('about') }}" class="btn btn-denim px-4">
                            Baca Selengkapnya
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light px-4">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.03); border: 1px dashed #f59e0b;">
                        <h5 class="fw-bold text-warning mb-3"><i class="bi bi-quote fs-3 me-1"></i> Tagline: Wear Your Identity</h5>
                        <p class="text-light fst-italic mb-3">
                            "Setiap helai benang indigo dan lipatan denim memiliki cerita. Di DENIMORA, kami menjahit kenyamanan untuk menyertai setiap langkah berani Anda."
                        </p>
                        <div class="small text-secondary">— PT RYD Denim Management</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
