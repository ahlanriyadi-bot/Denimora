<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Denim Jeans', 'description' => 'Berbagai pilihan celana jeans denim.'],
            ['name' => 'Denim Jacket', 'description' => 'Koleksi jaket denim modern.'],
            ['name' => 'Denim Shirt', 'description' => 'Kemeja denim dengan desain stylish.'],
            ['name' => 'Denim Shorts', 'description' => 'Celana pendek denim untuk gaya kasual.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
