# DENIMORA — Website Penjualan Pakaian Denim (PT RYD Denim)

> **Tagline:** *"Wear Your Identity."*  
> Proyek Website Dinamis E-Commerce UMKM Fashion Denim untuk Tugas Kuliah Pemrograman Website berbasis **Laravel 12** dan **MySQL**.

---

## 1. Identitas Usaha & Brand

| Komponen | Keterangan |
| :--- | :--- |
| **Nama Brand** | **DENIMORA** |
| **Nama Perusahaan** | **PT RYD Denim** |
| **Tagline** | *Wear Your Identity.* |
| **Bidang Usaha** | Fashion dan Penjualan Pakaian Berbahan Denim |
| **Deskripsi Usaha** | DENIMORA merupakan usaha UMKM fashion yang berfokus pada penjualan berbagai jenis pakaian berbahan denim berkualitas tinggi seperti celana jeans (straight & slim fit), jaket denim (trucker & oversized), kemeja denim, dan celana pendek denim. Mengusung filosofi *timeless aesthetic* dan kenyamanan presisi untuk gaya hidup modern. |
| **Lokasi & Kontak** | Jl. Denim Nusantara No. 88, Sentra Kreatif Fashion Denim, Bandung, Jawa Barat. Telp/WA: +62 812-3456-7890, Email: info@denimora.co.id |

---

## 2. Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP 8.3 (CLI & Server)
- **Framework Backend:** Laravel 12.x
- **Database:** MySQL 8.x
- **Template Engine:** Laravel Blade
- **Styling & CSS Framework:** Bootstrap 5.3.3 & Bootstrap Icons
- **Frontend Core:** HTML5, CSS3, JavaScript (Vanilla ES6)
- **ORM:** Laravel Eloquent ORM (One-to-Many Relationship & Foreign Key Constraints)
- **Version Control:** Git & GitHub

---

## 3. Fitur Utama Sistem

### A. Halaman Publik (Frontend)
1. **Homepage (`/`)**:
   - Navbar interaktif dengan Logo DENIMORA, menu Home, Products, About Us, Contact, dan jalan pintas ke Admin Panel.
   - Hero section modern bernuansa *navy denim* dengan tagline, call-to-action button, dan visual denim craft.
   - 4 Pilar keunggulan produk (Bahan Premium, Jahitan Rantai/Chainstitch, Garansi Tukar Size, Pengiriman Cepat).
   - Section Kategori Denim dengan jumlah produk dinamis dari database.
   - Section Produk Unggulan (*Featured Products*) berformat *card* rapi dengan harga terformat Rupiah dan status ketersediaan stok.
   - Section Brand Story PT RYD Denim.
   - Footer profesional lengkap dengan info perusahaan, legalitas, navigasi, dan tautan sosial media.
2. **Katalog Produk (`/products`)**:
   - Menampilkan seluruh produk dari database MySQL melalui Controller.
   - Filter produk berdasarkan Kategori (*Jeans, Jackets, Shirts, Shorts*).
   - Pencarian dinamis (*Search by Name/Description*).
   - Pengurutan harga (*Termurah, Termahal, Terbaru, Terlama*).
   - Card produk rapi berukuran gambar konsisten dengan efek hover halus.
   - Pagination bawaan Laravel Bootstrap 5.
3. **Detail Produk (`/products/{id}`)**:
   - Menampilkan foto produk beresolusi tinggi.
   - Informasi nama, kategori badge, harga diskon & ritel, stok riil, serta deskripsi detail spesifikasi bahan.
   - Tombol pemesanan langsung terintegrasi ke **WhatsApp UMKM DENIMORA** dengan template pesan otomatis.
   - Tombol kembali ke katalog produk.
   - Section Produk Terkait (*Related Products*) dari kategori yang sama.
4. **Tentang Kami (`/about`)**:
   - Profil resmi brand DENIMORA dan badan usaha PT RYD Denim.
   - Visi dan Misi jangka panjang perusahaan.
   - Edukasi pengetahuan bahan denim (ketebalan oz, pewarnaan indigo, hardware tahan karat).
5. **Kontak Kami (`/contact`)**:
   - Informasi alamat galeri, alamat email, WhatsApp hotline, dan media sosial resmi.
   - Formulir pesan interaktif dengan validasi server-side dan notifikasi pesan berhasil.

### B. Halaman Admin (Backend CRUD)
1. **Dashboard Admin (`/admin`)**:
   - Kartu statistik metrik: Total Produk, Total Kategori, Total Unit Stok Gudang, dan Rata-rata Harga Jual.
   - Tabel ringkasan 5 produk denim terbaru.
   - Widget distribusi kategori dan jumlah produk masing-masing.
2. **Manajemen Produk (`/admin/products`)**:
   - **Create:** Menambah produk baru lengkap dengan nama, kategori, harga, stok, deskripsi, dan upload foto produk.
   - **Read:** Menampilkan tabel produk lengkap dengan thumbnail foto, nama, badge kategori, harga rupiah, stok, dan pencarian/filter.
   - **Update:** Mengedit informasi produk dengan fitur pratinjau (*live preview*) foto baru tanpa menghilangkan foto lama jika tidak diubah.
   - **Delete:** Menghapus data produk dengan modal konfirmasi aman serta otomatis menghapus file foto fisik dari folder storage disk.
3. **Manajemen Kategori (`/admin/categories`)**:
   - **Create:** Menambah kategori baru dengan validasi keunikan nama (*unique*).
   - **Read:** Menampilkan daftar kategori beserta hitungan produk terkait.
   - **Update:** Mengedit nama dan deskripsi kategori.
   - **Delete:** Menghapus kategori beserta relasi produk di dalamnya (*onDelete cascade*).

---

## 4. Struktur Database & Relasi Eloquent

Database terdiri atas dua tabel utama yang saling berelasi:

### Tabel `categories`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` (Primary Key, Auto Increment) | ID unik kategori |
| `name` | `VARCHAR(255)` | Nama kategori (Jeans, Jackets, Shirts, Shorts) |
| `description` | `TEXT` (Nullable) | Penjelasan singkat kategori |
| `created_at` | `TIMESTAMP` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Waktu data diperbarui |

### Tabel `products`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` (Primary Key, Auto Increment) | ID unik produk |
| `category_id` | `BIGINT UNSIGNED` (Foreign Key) | Merujuk ke `id` pada tabel `categories` (onDelete Cascade) |
| `name` | `VARCHAR(255)` | Nama pakaian denim |
| `description` | `TEXT` | Deskripsi, oz bahan, dan spesifikasi pakaian |
| `price` | `DECIMAL(12, 2)` | Harga produk (dalam Rupiah) |
| `stock` | `INT` | Jumlah stok produk tersedia di gudang |
| `image` | `VARCHAR(255)` (Nullable) | Lokasi path foto produk di `storage/app/public/products` |
| `created_at` | `TIMESTAMP` | Waktu data dibuat |
| `updated_at` | `TIMESTAMP` | Waktu data diperbarui |

### Relasi Eloquent:
- **One to Many:** Satu `Category` memiliki banyak (`hasMany`) `Product`.
- **Many to One:** Satu `Product` dimiliki oleh satu (`belongsTo`) `Category`.

```php
// app/Models/Category.php
public function products(): HasMany
{
    return $this->hasMany(Product::class);
}

// app/Models/Product.php
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}
```

---

## 5. Validasi Server-Side & Upload Gambar

Validasi ketat diterapkan di Controller:
- `name`: `required|string|max:255`
- `category_id`: `required|exists:categories,id`
- `price`: `required|numeric|min:0`
- `stock`: `required|integer|min:0`
- `description`: `required|string`
- `image`: `nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048`

Penyimpanan file foto menggunakan Laravel Storage:
- File disimpan pada direktori: `storage/app/public/products/`
- Tautan publik dihasilkan menggunakan: `php artisan storage:link`
- Saat produk dihapus atau diganti fotonya, file lama yang tersimpan di disk `public` otomatis dibersihkan melalui `Storage::disk('public')->delete(...)`.

---

## 6. Data Seeder Awal

Tersedia seeder otomatis (`php artisan db:seed`) yang menghasilkan 4 kategori dan 8 produk denim realistis dengan gambar ilustrasi denim:

1. **Classic Straight Denim Jeans** (Kategori: Jeans, Harga: Rp 389.000, Stok: 25)
2. **Slim Fit Blue Jeans** (Kategori: Jeans, Harga: Rp 429.000, Stok: 18)
3. **Oversized Denim Jacket** (Kategori: Jackets, Harga: Rp 549.000, Stok: 15)
4. **Vintage Denim Shirt** (Kategori: Shirts, Harga: Rp 329.000, Stok: 20)
5. **Casual Denim Shorts** (Kategori: Shorts, Harga: Rp 249.000, Stok: 30)
6. **Raw Selvedge Denim Jacket** (Kategori: Jackets, Harga: Rp 699.000, Stok: 10)
7. **Distressed Denim Trucker** (Kategori: Jackets, Harga: Rp 499.000, Stok: 12)
8. **Relaxed Fit Denim Shorts** (Kategori: Shorts, Harga: Rp 269.000, Stok: 22)

---

## 7. Struktur Direktori Proyek

```text
denimora/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/
│   │   │   ├── CategoryController.php
│   │   │   ├── DashboardController.php
│   │   │   └── ProductController.php
│   │   ├── CatalogController.php
│   │   └── HomeController.php
│   └── Models/
│       ├── Category.php
│       └── Product.php
├── database/
│   ├── migrations/
│   │   ├── ..._create_categories_table.php
│   │   └── ..._create_products_table.php
│   └── seeders/
│       ├── CategorySeeder.php
│       ├── ProductSeeder.php
│       └── DatabaseSeeder.php
├── public/
│   ├── images/
│   │   ├── denimora-logo.svg
│   │   ├── hero-denim.svg
│   │   └── denim-placeholder.svg
│   └── storage -> ../storage/app/public
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── products/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── products/
│       │   │   ├── index.blade.php
│       │   │   ├── create.blade.php
│       │   │   └── edit.blade.php
│       │   └── categories/
│       │       ├── index.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       ├── home.blade.php
│       ├── about.blade.php
│       └── contact.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── app/
│       └── public/
│           └── products/
└── tests/
    └── Feature/
        └── DenimoraFeatureTest.php
```

---

## 8. Panduan Menjalankan Proyek Secara Lokal

### Prasyarat:
1. PHP >= 8.2 (Disarankan **PHP 8.3**) dengan ekstensi: `pdo_mysql`, `fileinfo`, `mbstring`, `openssl`, `curl`, `gd`.
2. Composer 2.x
3. MySQL Server (Laragon, XAMPP, atau MySQL Standalone aktif di port 3306).

### Langkah-Langkah:
```bash
# 1. Masuk ke direktori proyek
cd denimora

# 2. Salin environment file jika belum ada
copy .env.example .env

# 3. Sesuaikan konfigurasi database pada file .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=denimora
DB_USERNAME=root
DB_PASSWORD=

# 4. Buat database di MySQL (jika belum dibuat)
mysql -u root -e "CREATE DATABASE IF NOT EXISTS denimora;"

# 5. Jalankan migrasi dan seeder awal
php artisan migrate:fresh --seed

# 6. Buat symbolic link untuk folder storage produk
php artisan storage:link

# 7. Jalankan unit & feature testing (11 tests, 59 assertions)
php artisan test

# 8. Jalankan local development server
php artisan serve
```

Buka peramban (browser) dan akses:
- **Halaman Website Publik:** [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Halaman Katalog Produk:** [http://127.0.0.1:8000/products](http://127.0.0.1:8000/products)
- **Halaman Dashboard Admin:** [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

---
*Dikembangkan dengan standar profesional untuk memenuhi tugas kuliah pengembangan website.*  
*Hak Cipta © 2026 PT RYD Denim — DENIMORA.*
