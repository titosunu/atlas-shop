<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name_product' => 'NIKE PUFFER JACKET',
            'category_id' => '1',
            'image' => 'pc1.jpg',
            'price' => '150000',
            'stock' => '9',
            'description' => 'SIZE M | P x L : 72 x 57',
        ]);

        Product::create([
            'name_product' => 'VINTAGE FLIGHT JACKET',
            'category_id' => '1',
            'image' => 'pc2.jpg',
            'price' => '200000',
            'stock' => '4',
            'description' => 'SIZE XL | P x L : 63 x 62',
        ]);

        Product::create([
            'name_product' => 'UNIQLO BOMBER JACKET',
            'category_id' => '1',
            'image' => 'pc3.jpg',
            'price' => '150000',
            'stock' => '5',
            'description' => 'SIZE M | P x L : 62 x 60',
        ]);

        Product::create([
            'name_product' => 'WORK JACKET BY FORECAST',
            'category_id' => '1',
            'image' => 'pc4.jpg',
            'price' => '230000',
            'stock' => '2',
            'description' => 'SIZE M | P x L : 64 x 60',
        ]);

        Product::create([
            'name_product' => 'UN*QLO SOFTSHELL JACKET',
            'category_id' => '1',
            'image' => 'pc5.jpg',
            'price' => '230000',
            'stock' => '3',
            'description' => 'P x L : 65 x 56',
        ]);

        Product::create([
            'name_product' => 'CHAMP*ON',
            'category_id' => '1',
            'image' => 'pc6.jpg',
            'price' => '150000',
            'stock' => '5',
            'description' => 'P x L : 72 x 63',
        ]);

        Product::create([
            'name_product' => 'AD*DAS',
            'category_id' => '1',
            'image' => 'pc7.jpg',
            'price' => '135000',
            'stock' => '1',
            'description' => 'P x L : 72 x 56',
        ]);

        Product::create([
            'name_product' => 'FLIGHT JACKET',
            'category_id' => '1',
            'image' => 'pc8.jpg',
            'price' => '300000',
            'stock' => '2',
            'description' => 'P x L : 64 x 62',
        ]);

        Product::create([
            'name_product' => 'WORK JACKET BY BAGGER',
            'category_id' => '1',
            'image' => 'pc9.jpg',
            'price' => '200000',
            'stock' => '3',
            'description' => 'P x L : 67 x 58',
        ]);

        Product::create([
            'name_product' => 'AD*DAS CASUAL JACKET',
            'category_id' => '1',
            'image' => 'pc10.jpg',
            'price' => '100000',
            'stock' => '4',
            'description' => 'P x L : 66 x 56',
        ]);
    }
}
