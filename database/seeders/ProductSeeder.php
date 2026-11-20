<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jeans = Category::where('name', 'Jeans')->first();
        $jackets = Category::where('name', 'Jackets')->first();
        $shirts = Category::where('name', 'Shirts')->first();
        $shorts = Category::where('name', 'Shorts')->first();

        $products = [
            [
                'category_id' => $jeans->id,
                'name' => 'Classic Straight Denim Jeans',
                'description' => 'Celana denim bergaya klasik straight leg dengan ketebalan 13.5 oz raw rigid indigo. Dirancang dengan jahitan rantai (chainstitch) kuat, hardware kuningan tahan karat, dan kenyamanan pemakaian jangka panjang yang membentuk fader unik seiring waktu.',
                'price' => 389000,
                'stock' => 25,
                'image' => 'products/classic-straight-jeans.svg',
            ],
            [
                'category_id' => $jeans->id,
                'name' => 'Slim Fit Blue Jeans',
                'description' => 'Celana jeans modern siluet slim fit berbahan 12 oz comfort stretch denim. Memberikan ruang gerak yang leluasa tanpa kehilangan siluet rapi, dilengkapi dengan pencucian mid-blue wash yang segar dan versatile untuk gaya apa saja.',
                'price' => 429000,
                'stock' => 18,
                'image' => 'products/slim-fit-blue-jeans.svg',
            ],
            [
                'category_id' => $jackets->id,
                'name' => 'Oversized Denim Jacket',
                'description' => 'Jaket denim oversized kontemporer dengan bahan 14 oz washed stone blue. Mengusung drop-shoulder cut yang trendy, saku depan ganda, serta kancing emboss eksklusif DENIMORA. Ideal untuk outer cuaca sejuk maupun streetwear layer.',
                'price' => 549000,
                'stock' => 15,
                'image' => 'products/oversized-denim-jacket.svg',
            ],
            [
                'category_id' => $shirts->id,
                'name' => 'Vintage Denim Shirt',
                'description' => 'Kemeja denim bertekstur vintage berbahan 7.5 oz lightweight denim cotton 100%. Dilengkapi kerah button-down rapi, saku dada ganda dengan flap, dan efek fade alami yang memberi kesan timeless bagi pria maupun wanita.',
                'price' => 329000,
                'stock' => 20,
                'image' => 'products/vintage-denim-shirt.svg',
            ],
            [
                'category_id' => $shorts->id,
                'name' => 'Casual Denim Shorts',
                'description' => 'Celana pendek denim santai bermaterial 11.5 oz washed denim dengan aksen raw cut-off hem. Nyaman untuk cuaca tropis, cocok dipadukan dengan kaos polos, polo shirt, atau kemeja santai untuk hangout akhir pekan.',
                'price' => 249000,
                'stock' => 30,
                'image' => 'products/casual-denim-shorts.svg',
            ],
            [
                'category_id' => $jackets->id,
                'name' => 'Raw Selvedge Denim Jacket',
                'description' => 'Koleksi jaket denim premium edisi terbatas berbahan 15 oz Japanese Redline Selvedge Denim. Kaku di awal namun akan menghasilkan guratan fading dramatis dan personal. Dilengkapi cinch-back dan interior selvedge line id.',
                'price' => 699000,
                'stock' => 10,
                'image' => 'products/raw-selvedge-jacket.svg',
            ],
            [
                'category_id' => $jackets->id,
                'name' => 'Distressed Denim Trucker',
                'description' => 'Jaket denim trucker klasik dengan sentuhan hand-distressed dan acid wash yang berkarakter. Potongan regular fit dengan detail saku samping tersembunyi untuk fungsionalitas harian.',
                'price' => 499000,
                'stock' => 12,
                'image' => 'products/distressed-trucker.svg',
            ],
            [
                'category_id' => $shorts->id,
                'name' => 'Relaxed Fit Denim Shorts',
                'description' => 'Celana pendek denim berpotongan relaxed fit dalam balutan warna bleached sky blue. Dilengkapi karet pinggang elastis dengan drawcord dan bahan katun denim yang ekstra lembut untuk kenyamanan maksimal.',
                'price' => 269000,
                'stock' => 22,
                'image' => 'products/relaxed-denim-shorts.svg',
            ],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}
