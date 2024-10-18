<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ListCategoryAveragePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:average-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the average price of products for each category and the number of products in each category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = Category::with('products')
            ->select('categories.id', 'categories.name', DB::raw('AVG(products.price) as average_price'), DB::raw('COUNT(products.id) as product_count'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.name')
            ->get();

        if ($categories->isEmpty()) {
            $this->info('No categories found.');
            return 0;
        }

        $this->table(
            ['Category ID', 'Category Name', 'Average Price', 'Product Count'],
            $categories->map(function ($category) {
                return [
                    $category->id,
                    $category->name,
                    number_format($category->average_price, 2),
                    $category->product_count,
                ];
            })->toArray()
        );

        return 0;
    }
}