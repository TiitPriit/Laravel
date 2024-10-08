<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Product;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {price} {description?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->error('No categories found. Please create a category first.');
            return 1;
        }

        $categoryNames = $categories->pluck('name')->toArray();
        $selectedCategoryName = $this->choice('Select a category for this product', $categoryNames);

        $category = $categories->firstWhere('name', $selectedCategoryName);

        $product = $category->products()->create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        $this->info('Product created successfully: ' . $product->name);
        return 0;
    }
}