@extends('layouts.app')

@section('title', 'Katalog Produk Denim — DENIMORA')

@section('content')
    <!-- HEADER SECTION -->
    <section class="py-4 bg-dark text-white" style="background: linear-gradient(135deg, #0a1128 0%, #1e3a8a 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2 small">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-info text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-light" aria-current="page">Products</li>
                        </ol>
                    </nav>
                    <h2 class="fw-bold mb-1">Katalog Produk Denim</h2>
                    <p class="text-light text-opacity-75 mb-0 small">
                        Temukan koleksi jeans, jaket, kemeja, dan celana pendek denim terbaik dengan kualitas premium.
                    </p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-semibold">
                        Menampilkan {{ $products->total() }} Produk
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CATALOG CONTENT -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- SIDEBAR FILTER -->
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-funnel me-2 text-primary"></i>Filter Produk</h6>
                            @if(request()->hasAny(['category', 'search', 'sort']))
                                <a href="{{ route('products.index') }}" class="text-danger small text-decoration-none">Reset</a>
                            @endif
                        </div>

                        <!-- Form Filter & Pencarian -->
                        <form action="{{ route('products.index') }}" method="GET">
                            <!-- Search Query -->
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Cari Produk</label>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Nama / bahan..." value="{{ request('search') }}">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Filter Kategori -->
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Kategori</label>
                                <div class="list-group list-group-flush small">
                                    <a href="{{ route('products.index', array_merge(request()->except('category', 'page'))) }}" 
                                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-1 border-0 {{ !request('category') ? 'fw-bold text-primary' : 'text-secondary' }}">
                                        <span>Semua Kategori</span>
                                        <span class="badge bg-light text-dark border">{{ \App\Models\Product::count() }}</span>
                                    </a>
                                    @foreach($categories as $cat)
                                        <a href="{{ route('products.index', array_merge(request()->except('page'), ['category' => $cat->id])) }}" 
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-1 border-0 {{ request('category') == $cat->id ? 'fw-bold text-primary' : 'text-secondary' }}">
                                            <span>{{ $cat->name }}</span>
                                            <span class="badge bg-light text-dark border">{{ $cat->products_count }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Pengurutan (Sorting) -->
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-secondary">Urutkan</label>
                                <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga: Termurah</option>
                                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga: Termahal</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Produk Terlama</option>
                                </select>
                            </div>

                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif

                            <button type="submit" class="btn btn-sm btn-outline-primary w-100 rounded-pill">Terapkan Filter</button>
                        </form>
                    </div>

                    <!-- Banner Info -->
                    <div class="p-3 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 small text-primary d-none d-lg-block">
                        <div class="fw-bold mb-1"><i class="bi bi-shield-check me-1"></i> Jaminan Otentik</div>
                        Semua produk denim DENIMORA diproduksi oleh PT RYD Denim dengan standar jahitan ketat dan bahan berkualitas.
                    </div>
                </div>

                <!-- PRODUCT GRID -->
                <div class="col-lg-9">
                    <!-- Filter Info Badges -->
                    @if(request('search') || request('category'))
                        <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                            <span class="small text-secondary">Filter Aktif:</span>
                            @if(request('search'))
                                <span class="badge bg-secondary">Pencarian: "{{ request('search') }}"</span>
                            @endif
                            @if($selectedCategory)
                                <span class="badge bg-primary">Kategori: {{ $selectedCategory->name }}</span>
                            @endif
                            <a href="{{ route('products.index') }}" class="btn btn-link btn-sm text-danger p-0 text-decoration-none small">Hapus Semua Filter</a>
                        </div>
                    @endif

                    <div class="row g-4">
                        @forelse($products as $product)
                            <div class="col-md-6 col-xl-4">
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
                                                View Detail <i class="bi bi-chevron-right ms-1 small"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="card border-0 shadow-sm rounded-4 p-5">
                                    <i class="bi bi-search fs-1 text-muted mb-3"></i>
                                    <h5 class="fw-bold text-dark">Tidak Ada Produk yang Ditemukan</h5>
                                    <p class="text-muted small">Coba ubah kata kunci pencarian atau pilih kategori denim lainnya.</p>
                                    <div>
                                        <a href="{{ route('products.index') }}" class="btn btn-denim rounded-pill px-4 btn-sm">
                                            Lihat Semua Produk
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
