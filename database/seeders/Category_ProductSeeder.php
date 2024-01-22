<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Category_Product;

class Category_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = Category::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        $totalRows = 0;

        while ($totalRows < 100) {
            $product = $this->getRandomElement($products);
            $category = $this->getRandomElement($categories);

            // Check if the combination already exists
            if (!Category_Product::where(['product_id' => $product, 'category_id' => $category])->exists()) {
                Category_Product::create([
                    'product_id' => $product,
                    'category_id' => $category,
                ]);

                $totalRows++;
            }
        }

        echo "Total Rows Created: $totalRows";
    }

    private function getRandomElement($array)
    {
        shuffle($array);
        return reset($array);
    }
}
