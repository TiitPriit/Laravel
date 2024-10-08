<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Disable foreign key checks to avoid issues during truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the tables to start fresh
        Category::truncate();
        Product::truncate();

        // Enable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create 10 categories
        $categories = Category::factory()->count(10)->create();

        // Create 1,000 products for each category
        foreach ($categories as $category) {
            Product::factory()->count(1000)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}