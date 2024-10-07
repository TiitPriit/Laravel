<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class ListCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all categories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->info('No categories found.');
            return 0;
        }

        $this->table(
            ['ID', 'Name'],
            $categories->map(function ($category) {
                return [
                    $category->id,
                    $category->name,
                ];
            })->toArray()
        );

        return 0;
    }
}