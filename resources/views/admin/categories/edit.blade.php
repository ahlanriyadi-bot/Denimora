@extends('layouts.admin')

@section('title', 'Edit Kategori — ' . $category->name)
@section('page_title', 'Edit Kategori: ' . $category->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pencil-square me-2 text-primary"></i>Formulir Edit Kategori</h6>
                        <span class="text-muted small">Perbarui data nama dan deskripsi kategori</span>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Kategori -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold small text-secondary">
                                Nama Kategori <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi Kategori -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold small text-secondary">
                                Deskripsi Kategori (Opsional)
                            </label>
                            <textarea name="description" id="description" rows="4" 
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 d-inline-flex align-items-center gap-2 shadow-sm">
                                <i class="bi bi-check-lg"></i>
                                <span>Perbarui Kategori</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
