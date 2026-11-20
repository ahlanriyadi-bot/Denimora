@extends('layouts.admin')

@section('title', 'Manajemen Kategori — DENIMORA Admin')
@section('page_title', 'Manajemen Kategori Produk')

@section('content')
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <div>
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-tags me-2 text-primary"></i>Daftar Kategori Denim</h6>
                <span class="text-muted small">Kelola klasifikasi produk seperti Jeans, Jackets, Shirts, dan Shorts</span>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1 shadow-sm">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Kategori</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Produk</th>
                        <th>Dibuat Pada</th>
                        <th class="text-end" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td class="text-muted fw-semibold">#{{ $cat->id }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $cat->name }}</div>
                            </td>
                            <td class="text-secondary small" style="max-width: 380px;">
                                {{ $cat->description ?? '-' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.products.index', ['category' => $cat->id]) }}" class="badge bg-primary text-decoration-none px-2 py-1">
                                    {{ $cat->products_count }} Produk
                                </a>
                            </td>
                            <td class="small text-muted">
                                {{ $cat->created_at->format('d M Y') }}
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-outline-primary" title="Edit Kategori">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" title="Hapus Kategori"
                                            data-bs-toggle="modal" data-bs-target="#deleteCatModal{{ $cat->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- MODAL HAPUS KATEGORI -->
                                <div class="modal fade" id="deleteCatModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h6 class="modal-title fw-bold">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus Kategori
                                                </h6>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start p-4">
                                                <p>Apakah Anda yakin ingin menghapus kategori <strong>"{{ $cat->name }}"</strong>?</p>
                                                @if($cat->products_count > 0)
                                                    <div class="alert alert-warning small mb-0">
                                                        <i class="bi bi-exclamation-circle-fill me-1"></i>
                                                        <strong>Peringatan:</strong> Kategori ini memiliki <strong>{{ $cat->products_count }} produk</strong> terkait. Menghapus kategori ini juga akan menghapus seluruh produk yang ada di dalamnya (cascade).
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger px-3">
                                                        <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Kategori
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
                            <td colspan="6" class="text-center py-5 text-muted">
                                Belum ada kategori yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white py-3">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
