<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {price} {description?}';
    protected $description = 'Create a new product';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $price = $this->argument('price');
        $description = $this->argument('description');

        // Fetch all categories
        $categories = Category::all();

        // Debugging line
        $this->info('Categories found: ' . $categories->count());

        if ($categories->isEmpty()) {
            $this->error('No categories found. Please add categories first.');
            return 1;
        }

        // Display categories and let user choose
        $categoryOptions = $categories->pluck('name', 'id')->toArray();
        $categoryId = $this->choice('Select a category', $categoryOptions);

        // Create the product
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->category_id = $categoryId; // Use the selected category ID directly
        $product->description = $description;
        $product->save();

        $this->info('Product created successfully!');
        return 0;
    }
    
}