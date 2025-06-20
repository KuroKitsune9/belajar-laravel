<?php

namespace Database\Seeders;

use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        Product::create([
            'category_id' => 1,
            'name' => 'Baju anak',
            'slug' => 'baju-anak',
            'description' => 'lorem',
            'price' => 750000,
            'stock' => 100,
            'image' => 'image.png'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Samsung S25 g',
            'slug' => 'samsung-s25-g',
            'description' => 'lorem',
            'price' => 1750000,
            'stock' => 100,
            'image' => 'image.png'
        ]);
    }
}
