@extends('layouts.admin')

@section('title', 'Edit Produk — ' . $product->name)
@section('page_title', 'Edit Produk: ' . $product->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square me-2 text-primary"></i>Formulir Edit Produk</h6>
                        <span class="text-muted small">Perbarui data atau foto pakaian denim</span>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <!-- Kolom Kiri: Informasi Produk -->
                            <div class="col-md-7">
                                <!-- Nama Produk -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold small text-secondary">
                                        Nama Produk Denim <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name', $product->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kategori Produk -->
                                <div class="mb-3">
                                    <label for="category_id" class="form-label fw-semibold small text-secondary">
                                        Kategori Produk <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" id="category_id" 
                                            class="form-select @error('category_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori Denim --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3 mb-3">
                                    <!-- Harga Produk -->
                                    <div class="col-sm-6">
                                        <label for="price" class="form-label fw-semibold small text-secondary">
                                            Harga (Rupiah) <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-muted small">Rp</span>
                                            <input type="number" name="price" id="price" 
                                                   class="form-control @error('price') is-invalid @enderror" 
                                                   value="{{ old('price', (int)$product->price) }}" min="0" step="1000" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Stok Produk -->
                                    <div class="col-sm-6">
                                        <label for="stock" class="form-label fw-semibold small text-secondary">
                                            Jumlah Stok (Pcs) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="stock" id="stock" 
                                               class="form-control @error('stock') is-invalid @enderror" 
                                               value="{{ old('stock', $product->stock) }}" min="0" required>
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Deskripsi Produk -->
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-semibold small text-secondary">
                                        Deskripsi & Spesifikasi Produk <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="description" id="description" rows="6" 
                                              class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan: Foto Produk & Ganti Foto -->
                            <div class="col-md-5">
                                <label class="form-label fw-semibold small text-secondary">
                                    Foto Produk Saat Ini
                                </label>
                                <div class="card border rounded-4 p-3 text-center bg-light">
                                    <!-- Current / New Preview -->
                                    <div class="rounded-3 overflow-hidden bg-dark mb-3 mx-auto d-flex align-items-center justify-content-center" 
                                         style="width: 100%; max-width: 260px; height: 260px; position: relative;">
                                        <img id="imagePreview" src="{{ $product->image_url }}" 
                                             alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover">
                                    </div>

                                    <div class="mb-2">
                                        <label for="imageInput" class="form-label small fw-semibold text-dark">
                                            Unggah Foto Baru (Opsional):
                                        </label>
                                        <input type="file" name="image" id="imageInput" 
                                               class="form-control form-control-sm @error('image') is-invalid @enderror" 
                                               accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml">
                                        @error('image')
                                            <div class="invalid-feedback text-start">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <p class="small text-muted mb-0" style="font-size: 0.75rem;">
                                        Kosongkan jika tidak ingin mengganti foto saat ini.<br>Maksimal ukuran file: <strong>2MB (2048 KB)</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 text-secondary opacity-25">

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 d-inline-flex align-items-center gap-2 shadow-sm">
                                <i class="bi bi-check-lg"></i>
                                <span>Perbarui Produk Denim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('imagePreview').src = evt.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
