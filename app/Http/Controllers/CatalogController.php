<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Menampilkan katalog produk publik lengkap dengan filter dan search.
     */
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();

        $query = Product::with('category');

        // Filter berdasarkan Kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Pencarian berdasarkan Nama atau Deskripsi Produk
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // Pengurutan (Sorting)
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        // Pagination 8 produk per halaman
        $products = $query->paginate(8)->withQueryString();

        $selectedCategory = $request->filled('category') 
            ? Category::find($request->category) 
            : null;

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    /**
     * Menampilkan detail satu produk beserta produk terkait (related products).
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        // Ambil produk terkait dari kategori yang sama (maksimal 4)
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
