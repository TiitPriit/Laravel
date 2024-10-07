<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class ListCategories extends Command
{
    protected $signature = 'category:list';
    protected $description = 'List all categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch all categories
        $categories = Category::all(['id', 'name']);

        if ($categories->isEmpty()) {
            $this->error('No categories found.');
            return 1;
        }

        // Display categories
        $this->table(['ID', 'Name'], $categories);

        return 0;
    }
}