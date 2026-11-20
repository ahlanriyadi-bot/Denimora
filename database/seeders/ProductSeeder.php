<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category' => 'Denim Jeans',
                'name' => 'Classic Straight Jeans',
                'description' => 'Celana jeans klasik dengan potongan straight yang nyaman untuk aktivitas sehari-hari.',
                'price' => 250000,
                'stock' => 20,
            ],
            [
                'category' => 'Denim Jeans',
                'name' => 'Slim Fit Blue Jeans',
                'description' => 'Celana denim slim fit dengan warna blue denim yang elegan.',
                'price' => 275000,
                'stock' => 15,
            ],
            [
                'category' => 'Denim Jacket',
                'name' => 'Oversized Denim Jacket',
                'description' => 'Jaket denim oversized dengan desain modern dan fashionable.',
                'price' => 350000,
                'stock' => 10,
            ],
            [
                'category' => 'Denim Shirt',
                'name' => 'Vintage Denim Shirt',
                'description' => 'Kemeja denim bergaya vintage yang cocok untuk tampilan kasual.',
                'price' => 225000,
                'stock' => 12,
            ],
            [
                'category' => 'Denim Shorts',
                'name' => 'Casual Denim Shorts',
                'description' => 'Celana pendek denim dengan desain simpel dan nyaman.',
                'price' => 175000,
                'stock' => 18,
            ],
        ];

        foreach ($products as $item) {
            $category = Category::where('name', $item['category'])->firstOrFail();

            Product::firstOrCreate(
                ['name' => $item['name']],
                [
                    'category_id' => $category->id,
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'image' => null,
                ]
            );
        }
    }
}
