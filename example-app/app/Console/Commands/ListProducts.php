<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class ListProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->info('No products found.');
            return 0;
        }

        $this->table(
            ['ID', 'Name', 'Description', 'Price', 'Category ID'],
            $products->map(function ($product) {
                return [
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->price,
                    $product->category_id,
                ];
            })->toArray()
        );

        return 0;
    }
}