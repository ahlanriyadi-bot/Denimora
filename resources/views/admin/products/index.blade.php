@extends('layouts.admin')

@section('title', 'Manajemen Produk — DENIMORA Admin')
@section('page_title', 'Manajemen Produk Denim')

@section('content')
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <!-- HEADER & FILTER -->
        <div class="card-header bg-white py-3 border-bottom">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-4">
                    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex gap-2">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama produk..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        @if(request('search') || request('category'))
                            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-danger" title="Reset">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                    </form>
                </div>

                <div class="col-md-8 d-flex justify-content-md-end align-items-center gap-2 flex-wrap">
                    <!-- Filter Kategori -->
                    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex align-items-center gap-2">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        <select name="category" class="form-select form-select-sm" onchange="this.form.submit()" style="min-width: 170px;">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <!-- Tombol Tambah Produk -->
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1 shadow-sm">
                        <i class="bi bi-plus-lg"></i>
                        <span>Tambah Produk Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- TABEL PRODUK -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 70px;">Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-end" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $prod)
                        <tr>
                            <td>
                                <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" class="rounded-3 border" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $prod->name }}</div>
                                <div class="text-muted small" style="max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $prod->description }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                    {{ $prod->category->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-dark">{{ $prod->formatted_price }}</span>
                            </td>
                            <td>
                                <span class="badge {{ $prod->stock > 5 ? 'bg-success' : ($prod->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                    {{ $prod->stock }} pcs
                                </span>
                            </td>
                            <td class="small text-muted">
                                {{ $prod->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('products.show', $prod->id) }}" target="_blank" class="btn btn-outline-info" title="Lihat di Web">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $prod->id) }}" class="btn btn-outline-primary" title="Edit Produk">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" title="Hapus Produk" 
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $prod->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- MODAL HAPUS PRODUK -->
                                <div class="modal fade" id="deleteModal{{ $prod->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $prod->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h6 class="modal-title fw-bold" id="deleteModalLabel{{ $prod->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus Produk
                                                </h6>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start p-4">
                                                <p class="mb-2">Apakah Anda yakin ingin menghapus produk ini secara permanen?</p>
                                                <div class="p-3 bg-light rounded-3 border d-flex align-items-center gap-3">
                                                    <img src="{{ $prod->image_url }}" alt="" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;">
                                                    <div>
                                                        <div class="fw-bold text-dark">{{ $prod->name }}</div>
                                                        <div class="small text-muted">{{ $prod->category->name }} • {{ $prod->formatted_price }}</div>
                                                    </div>
                                                </div>
                                                <p class="small text-danger mt-2 mb-0">
                                                    * Foto produk di folder storage juga akan dibersihkan secara otomatis.
                                                </p>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger px-3">
                                                        <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Produk
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                Belum ada data produk denim yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="card-footer bg-white py-3 d-flex justify-content-between align-items-center">
            <span class="small text-muted">
                Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
            </span>
            <div>
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
