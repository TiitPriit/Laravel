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
    protected $signature = 'product:create {name} {price} {category_id} {description?}';

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
        $categoryId = $this->argument('category_id');

        $category = Category::find($categoryId);

        if (!$category) {
            $this->error('Category not found.');
            return 1;
        }

        $product = $category->products()->create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        $this->info('Product created successfully: ' . $product->name);
        return 0;
    }
}