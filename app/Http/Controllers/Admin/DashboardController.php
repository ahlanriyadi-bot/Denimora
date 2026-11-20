<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan ringkasan statistik.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalStock = Product::sum('stock');
        $averagePrice = Product::avg('price') ?? 0;

        // 5 Produk Terbaru
        $latestProducts = Product::with('category')->latest()->take(5)->get();

        // Kategori beserta jumlah produknya
        $categories = Category::withCount('products')->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'averagePrice',
            'latestProducts',
            'categories'
        ));
    }
}
