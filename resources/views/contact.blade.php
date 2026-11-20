@extends('layouts.app')

@section('title', 'Kontak Kami — DENIMORA | PT RYD Denim')

@section('content')
    <!-- HEADER -->
    <section class="py-5 bg-dark text-white text-center" style="background: linear-gradient(135deg, #0a1128 0%, #1e3a8a 100%);">
        <div class="container py-4">
            <span class="badge bg-info bg-opacity-25 text-info px-3 py-1 rounded-pill fw-bold text-uppercase mb-3">Hubungi Kami</span>
            <h1 class="display-5 fw-bold mb-3">Kami Siap Mendengar Anda</h1>
            <p class="lead text-light text-opacity-75 mx-auto" style="max-width: 600px;">
                Punya pertanyaan mengenai ukuran, pemesanan kustom, atau kerjasama dengan PT RYD Denim? Tim customer care DENIMORA siap membantu Anda.
            </p>
        </div>
    </section>

    <!-- CONTACT CONTENT -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- INFO KONTAK -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white h-100">
                        <h4 class="fw-bold text-dark mb-4">Informasi Kontak & Outlet</h4>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-3 p-3 bg-danger bg-opacity-10 text-danger fs-4">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Alamat Usaha</h6>
                                <p class="text-secondary small mb-0">
                                    <strong>PT RYD Denim (DENIMORA Store)</strong><br>
                                    Jl. Denim Nusantara No. 88, Sentra Kreatif Fashion Denim,<br>
                                    Kota Bandung, Jawa Barat 40115, Indonesia
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-3 p-3 bg-primary bg-opacity-10 text-primary fs-4">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email Resmi</h6>
                                <p class="text-secondary small mb-0">
                                    Customer Support: <a href="mailto:info@denimora.co.id" class="text-primary text-decoration-none">info@denimora.co.id</a><br>
                                    Kerjasama: <a href="mailto:ptryd@denimora.co.id" class="text-primary text-decoration-none">ptryd@denimora.co.id</a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-3 p-3 bg-success bg-opacity-10 text-success fs-4">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">WhatsApp & Telepon</h6>
                                <p class="text-secondary small mb-0">
                                    Hotline: <a href="https://wa.me/6281234567890" target="_blank" class="text-success fw-bold text-decoration-none">+62 812-3456-7890</a><br>
                                    Jam Operasional: Senin - Sabtu (08.00 - 20.00 WIB)
                                </p>
                            </div>
                        </div>

                        <hr class="my-4 text-secondary opacity-25">

                        <div>
                            <h6 class="fw-bold text-dark mb-3">Ikuti Media Sosial Kami:</h6>
                            <div class="d-flex gap-2">
                                <a href="https://instagram.com" target="_blank" class="btn btn-outline-dark rounded-pill px-3 py-2 small d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-instagram text-danger"></i>
                                    <span>@denimora.official</span>
                                </a>
                                <a href="https://tiktok.com" target="_blank" class="btn btn-outline-dark rounded-pill px-3 py-2 small d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-tiktok text-dark"></i>
                                    <span>@denimora_id</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM PESAN -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
                        <h4 class="fw-bold text-dark mb-2">Kirim Pesan atau Pertanyaan</h4>
                        <p class="text-secondary small mb-4">
                            Silakan isi formulir di bawah ini. Tim kami akan segera menindaklanjuti pesan Anda melalui email atau WhatsApp.
                        </p>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Rian Pratama" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Alamat Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-secondary">Subjek Pesan <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Contoh: Tanya ketersediaan size denim jacket" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-secondary">Isi Pesan <span class="text-danger">*</span></label>
                                    <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-denim px-4 py-2 rounded-3 d-inline-flex align-items-center gap-2">
                                        <i class="bi bi-send-fill"></i>
                                        <span>Kirim Pesan Sekarang</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
