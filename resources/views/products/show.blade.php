@extends('layouts.app')

@section('title', $product->name . ' — DENIMORA')

@section('content')
    <!-- BREADCRUMB -->
    <div class="bg-white border-bottom py-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Products</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="text-decoration-none text-primary">{{ $product->category->name }}</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- PRODUCT DETAIL SECTION -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- PRODUCT IMAGE -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative bg-dark" style="aspect-ratio: 1/1;">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover">
                        <span class="position-absolute top-0 start-0 m-3 badge bg-dark bg-opacity-75 text-info px-3 py-2 rounded-pill border border-info border-opacity-25 text-uppercase">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>

                <!-- PRODUCT INFO -->
                <div class="col-lg-6">
                    <div class="ps-lg-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-semibold">
                                {{ $product->category->name }}
                            </span>
                            @if($product->stock > 5)
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill fw-semibold">
                                    <i class="bi bi-check-circle-fill me-1"></i> Stok Tersedia ({{ $product->stock }})
                                </span>
                            @elseif($product->stock > 0)
                                <span class="badge bg-warning bg-opacity-15 text-warning px-3 py-1 rounded-pill fw-semibold">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Stok Terbatas (Sisa {{ $product->stock }})
                                </span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fw-semibold">
                                    <i class="bi bi-x-circle-fill me-1"></i> Stok Habis
                                </span>
                            @endif
                        </div>

                        <h1 class="display-6 fw-bold text-dark mb-2">{{ $product->name }}</h1>

                        <div class="d-flex align-items-baseline gap-3 mb-4">
                            <span class="display-6 fw-extrabold text-primary">{{ $product->formatted_price }}</span>
                            <span class="text-muted small text-decoration-line-through">
                                Rp {{ number_format($product->price * 1.25, 0, ',', '.') }}
                            </span>
                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1 small">Hemat 20%</span>
                        </div>

                        <hr class="my-4 text-secondary opacity-25">

                        <!-- Deskripsi Produk -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-2">Deskripsi Produk:</h6>
                            <p class="text-secondary leading-relaxed" style="white-space: pre-line;">
                                {{ $product->description }}
                            </p>
                        </div>

                        <!-- Spesifikasi Denim -->
                        <div class="mb-4 p-3 rounded-3 bg-light border">
                            <div class="row g-2 small">
                                <div class="col-6">
                                    <span class="text-muted">Brand:</span> <strong>DENIMORA</strong>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Produsen:</span> <strong>PT RYD Denim</strong>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Kategori:</span> <strong>{{ $product->category->name }}</strong>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Stok Tersedia:</span> <strong>{{ $product->stock }} pcs</strong>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Actions -->
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            @php
                                $waText = urlencode("Halo DENIMORA (PT RYD Denim), saya tertarik untuk memesan produk:\n\n*{$product->name}*\nHarga: {$product->formatted_price}\nLink: " . route('products.show', $product->id));
                            @endphp
                            <a href="https://wa.me/6281234567890?text={{ $waText }}" target="_blank" class="btn btn-success btn-lg px-4 d-inline-flex align-items-center gap-2 rounded-3 shadow-sm">
                                <i class="bi bi-whatsapp fs-5"></i>
                                <span>Pesan via WhatsApp</span>
                            </a>

                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg px-4 d-inline-flex align-items-center gap-2 rounded-3">
                                <i class="bi bi-arrow-left"></i>
                                <span>Kembali ke Katalog</span>
                            </a>
                        </div>

                        <!-- Trust Guarantees -->
                        <div class="pt-3 border-top d-flex flex-wrap gap-4 text-muted small">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-shield-check text-primary fs-5"></i>
                                <span>100% Produk Original</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-arrow-repeat text-success fs-5"></i>
                                <span>Garansi Tukar Ukuran</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-box-seam text-warning fs-5"></i>
                                <span>Packaging Eksklusif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RELATED PRODUCTS SECTION -->
            @if($relatedProducts->count() > 0)
                <div class="mt-5 pt-5 border-top">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-bold text-uppercase mb-1">Koleksi Terkait</span>
                            <h3 class="fw-bold text-dark mb-0">Produk Serupa di Kategori {{ $product->category->name }}</h3>
                        </div>
                        <a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                            Lihat Semua di Kategori Ini
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach($relatedProducts as $rel)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-card">
                                    <div class="product-img-wrapper">
                                        <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}" class="product-img">
                                        <span class="product-badge-category">{{ $rel->category->name }}</span>
                                    </div>
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $rel->name }}">
                                            {{ $rel->name }}
                                        </h6>
                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top">
                                            <div class="fw-bold text-primary small">{{ $rel->formatted_price }}</div>
                                            <a href="{{ route('products.show', $rel->id) }}" class="btn btn-sm btn-outline-dark rounded-pill py-0 px-2 small">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
