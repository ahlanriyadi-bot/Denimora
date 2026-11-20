@extends('layouts.admin')

@section('title', 'Admin Dashboard — DENIMORA')
@section('page_title', 'Dashboard Ringkasan Usaha')

@section('content')
    <!-- STATISTIK UTAMA -->
    <div class="row g-4 mb-4">
        <!-- Total Produk -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-secondary small fw-bold text-uppercase">Total Produk</span>
                    <div class="rounded-3 p-2 bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                </div>
                <div class="h2 fw-bold text-dark mb-1">{{ $totalProducts }}</div>
                <div class="small text-muted">
                    <i class="bi bi-tags text-primary me-1"></i> Tersebar di {{ $totalCategories }} kategori
                </div>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-secondary small fw-bold text-uppercase">Kategori Denim</span>
                    <div class="rounded-3 p-2 bg-info bg-opacity-10 text-info">
                        <i class="bi bi-tags fs-4"></i>
                    </div>
                </div>
                <div class="h2 fw-bold text-dark mb-1">{{ $totalCategories }}</div>
                <div class="small text-muted">
                    <a href="{{ route('admin.categories.index') }}" class="text-info text-decoration-none">Kelola kategori &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Total Stok Fisik -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-secondary small fw-bold text-uppercase">Total Unit Stok</span>
                    <div class="rounded-3 p-2 bg-success bg-opacity-10 text-success">
                        <i class="bi bi-archive fs-4"></i>
                    </div>
                </div>
                <div class="h2 fw-bold text-dark mb-1">{{ number_format($totalStock, 0, ',', '.') }}</div>
                <div class="small text-muted">
                    <span class="text-success fw-semibold"><i class="bi bi-check-circle"></i> Stok aktif</span> di gudang
                </div>
            </div>
        </div>

        <!-- Rata-rata Harga -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-secondary small fw-bold text-uppercase">Rata-rata Harga</span>
                    <div class="rounded-3 p-2 bg-warning bg-opacity-15 text-warning">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
                <div class="h2 fw-bold text-dark mb-1">Rp {{ number_format($averagePrice, 0, ',', '.') }}</div>
                <div class="small text-muted">
                    Patokan harga jual denim
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS & RINGKASAN DATA -->
    <div class="row g-4 mb-4">
        <!-- 5 Produk Terbaru -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between border-bottom">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>5 Produk Terbaru</h6>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                        Lihat Semua Produk
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small">
                            <tr>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestProducts as $prod)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" class="rounded-2 border" style="width: 40px; height: 40px; object-fit: cover;">
                                            <div>
                                                <div class="fw-semibold text-dark small">{{ $prod->name }}</div>
                                                <div class="text-muted" style="font-size: 0.72rem;">Ditambahkan {{ $prod->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-primary border small">
                                            {{ $prod->category->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="fw-bold text-dark small">{{ $prod->formatted_price }}</td>
                                    <td>
                                        <span class="badge {{ $prod->stock > 5 ? 'bg-success' : 'bg-warning' }} small">
                                            {{ $prod->stock }} pcs
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.products.edit', $prod->id) }}" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('products.show', $prod->id) }}" target="_blank" class="btn btn-sm btn-outline-info py-1 px-2" title="Lihat di Web">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted small">Belum ada produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Ringkasan Kategori -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pie-chart me-2 text-info"></i>Distribusi Kategori</h6>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-success py-1 px-2 rounded-pill">
                        <i class="bi bi-plus"></i> Kategori
                    </a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse($categories as $c)
                        <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-light border">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center small fw-bold" style="width: 30px; height: 30px;">
                                    {{ substr($c->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark small">{{ $c->name }}</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">{{ Str::limit($c->description, 30) }}</div>
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $c->products_count }} item</span>
                        </div>
                    @empty
                        <div class="text-center text-muted small py-3">Belum ada kategori.</div>
                    @endforelse
                </div>

                <div class="mt-auto pt-4 border-top">
                    <div class="p-3 rounded-3 bg-primary bg-opacity-10 small text-primary">
                        <div class="fw-bold mb-1">Informasi UMKM</div>
                        <strong>PT RYD Denim — DENIMORA</strong><br>
                        Versi: Laravel 12.x • PHP 8.3 • MySQL
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
