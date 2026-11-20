<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DenimoraFeatureTest extends TestCase
{
    /**
     * Test 1: Halaman Utama (Homepage) dapat diakses dengan sukses.
     */
    public function test_homepage_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('DENIMORA');
        $response->assertSee('Wear Your Identity');
        $response->assertSee('PT RYD Denim');
    }

    /**
     * Test 2: Halaman Katalog Produk dapat diakses dan menampilkan produk dari database.
     */
    public function test_products_catalog_loads_and_displays_items()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('Katalog Produk Denim');
        
        $product = Product::first();
        if ($product) {
            $response->assertSee($product->name);
        }
    }

    /**
     * Test 3: Filter kategori dan pencarian berfungsi dengan baik.
     */
    public function test_products_catalog_filtering_and_search()
    {
        $category = Category::where('name', 'Jeans')->first();
        if ($category) {
            $response = $this->get('/products?category=' . $category->id);
            $response->assertStatus(200);
            $response->assertSee('Kategori: ' . $category->name);
        }

        $searchResponse = $this->get('/products?search=Classic');
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('Classic Straight Denim Jeans');
    }

    /**
     * Test 4: Halaman Detail Produk dapat diakses dan menampilkan informasi lengkap.
     */
    public function test_product_detail_page_loads()
    {
        $product = Product::first();
        $this->assertNotNull($product, 'Minimal harus ada 1 produk.');

        $response = $this->get('/products/' . $product->id);
        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->formatted_price);
        $response->assertSee('PT RYD Denim');
        $response->assertSee('Pesan via WhatsApp');
    }

    /**
     * Test 5: Halaman About Us dapat diakses dan menampilkan profil PT RYD Denim.
     */
    public function test_about_page_loads()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('PT RYD Denim');
        $response->assertSee('Visi Perusahaan');
        $response->assertSee('Misi Perusahaan');
    }

    /**
     * Test 6: Halaman Kontak dapat diakses dan formulir kontak dapat dikirimkan.
     */
    public function test_contact_page_loads_and_accepts_submission()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Jl. Denim Nusantara No. 88');

        $postResponse = $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Ukuran Jaket Denim',
            'message' => 'Halo, apakah ukuran XL jaket denim oversized masih tersedia?',
        ]);

        $postResponse->assertRedirect('/contact');
        $postResponse->assertSessionHas('success');
    }

    /**
     * Test 7: Dashboard Admin dapat diakses dan menampilkan ringkasan data.
     */
    public function test_admin_dashboard_loads()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard Ringkasan Usaha');
        $response->assertSee('Total Produk');
        $response->assertSee('Kategori Denim');
    }

    /**
     * Test 8: CRUD Kategori oleh Admin.
     */
    public function test_admin_category_crud()
    {
        // CREATE
        $createResponse = $this->post('/admin/categories', [
            'name' => 'Denim Vests',
            'description' => 'Rompi denim berkualitas untuk layering fashion.',
        ]);
        $createResponse->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['name' => 'Denim Vests']);

        $cat = Category::where('name', 'Denim Vests')->first();

        // UPDATE
        $updateResponse = $this->put('/admin/categories/' . $cat->id, [
            'name' => 'Denim Vests & Accessories',
            'description' => 'Rompi denim dan aksesoris fashion denim.',
        ]);
        $updateResponse->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['name' => 'Denim Vests & Accessories']);

        // DELETE
        $deleteResponse = $this->delete('/admin/categories/' . $cat->id);
        $deleteResponse->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['name' => 'Denim Vests & Accessories']);
    }

    /**
     * Test 9: CRUD Produk oleh Admin beserta Upload Gambar & Hapus Gambar.
     */
    public function test_admin_product_crud_with_image_upload()
    {
        Storage::fake('public');
        $category = Category::first();

        // CREATE with image upload
        $imageFile = UploadedFile::fake()->image('test-denim.jpg', 600, 600);
        $storeResponse = $this->post('/admin/products', [
            'name' => 'Raw Selvedge Denim Vest',
            'category_id' => $category->id,
            'price' => 350000,
            'stock' => 15,
            'description' => 'Rompi denim raw selvedge 14 oz dengan jahitan solid.',
            'image' => $imageFile,
        ]);

        $storeResponse->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['name' => 'Raw Selvedge Denim Vest']);

        $product = Product::where('name', 'Raw Selvedge Denim Vest')->first();
        $this->assertNotNull($product->image);
        Storage::disk('public')->assertExists($product->image);

        // UPDATE with new image
        $newImageFile = UploadedFile::fake()->image('test-denim-updated.jpg', 600, 600);
        $updateResponse = $this->put('/admin/products/' . $product->id, [
            'name' => 'Raw Selvedge Denim Vest Updated',
            'category_id' => $category->id,
            'price' => 375000,
            'stock' => 20,
            'description' => 'Rompi denim raw selvedge 14 oz diperbarui.',
            'image' => $newImageFile,
        ]);

        $updateResponse->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['name' => 'Raw Selvedge Denim Vest Updated']);

        $product->refresh();
        Storage::disk('public')->assertExists($product->image);

        // DELETE (verifies product deletion and file cleanup)
        $oldImagePath = $product->image;
        $deleteResponse = $this->delete('/admin/products/' . $product->id);
        $deleteResponse->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', ['name' => 'Raw Selvedge Denim Vest Updated']);
        Storage::disk('public')->assertMissing($oldImagePath);
    }

    /**
     * Test 10: Validasi Server-Side pada Formulir Produk.
     */
    public function test_admin_product_validation_errors()
    {
        $response = $this->post('/admin/products', [
            'name' => '', // required
            'category_id' => 999999, // invalid
            'price' => 'not-a-number', // numeric
            'stock' => -5, // min 0
            'description' => '', // required
        ]);

        $response->assertSessionHasErrors(['name', 'category_id', 'price', 'stock', 'description']);
    }
}
