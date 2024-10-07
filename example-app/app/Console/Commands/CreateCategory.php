<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $category = Category::create([
            'name' => $name,
        ]);

        $this->info('Category created successfully: ' . $category->name);
        return 0;
    }
}