<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Jeans',
                'description' => 'Koleksi celana jeans denim berkualitas tinggi dengan potongan straight, slim, hingga loose fit untuk kenyamanan harian.',
            ],
            [
                'name' => 'Jackets',
                'description' => 'Jaket denim bergaya klasik dan modern, mulai dari trucker jacket hingga oversized denim jacket dengan bahan kokoh.',
            ],
            [
                'name' => 'Shirts',
                'description' => 'Kemeja denim bertekstur lembut dan breathable, cocok untuk gaya kasual, semi-formal, maupun layering.',
            ],
            [
                'name' => 'Shorts',
                'description' => 'Celana pendek denim santai dengan daya tahan maksimal untuk aktivitas outdoor dan akhir pekan.',
            ],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat['name']], $cat);
        }
    }
}
