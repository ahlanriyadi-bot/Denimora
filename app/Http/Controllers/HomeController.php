<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Halaman Utama (Homepage) DENIMORA.
     */
    public function index()
    {
        // Ambil kategori beserta hitungan produk
        $categories = Category::withCount('products')->get();

        // Ambil 4 produk unggulan terbaru dengan relasi kategori
        $featuredProducts = Product::with('category')
            ->latest()
            ->take(4)
            ->get();

        $totalProducts = Product::count();

        return view('home', compact('categories', 'featuredProducts', 'totalProducts'));
    }

    /**
     * Halaman Tentang Kami (About Us).
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Halaman Kontak (Contact).
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Menangani submit pesan kontak dari pengunjung.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim! Tim DENIMORA (PT RYD Denim) akan segera menghubungi Anda.');
    }
}
