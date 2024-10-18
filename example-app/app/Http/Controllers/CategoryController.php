<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Charts\DemoChart;
use App\Charts\CategoryAveragePriceChart;
use App\Charts\FirstLetterCountChart;


class CategoryController extends Controller
{   
    public function showFirstLetterCountChart()
    {
        $productsByFirstLetter = Product::select(DB::raw('SUBSTRING(name, 1, 1) as first_letter'), DB::raw('COUNT(*) as product_count'))
            ->groupBy('first_letter')
            ->orderBy('first_letter')
            ->get();

        $chart = new FirstLetterCountChart;
        $chart->configure($productsByFirstLetter);

        return view('charts.first_letter_count', compact('chart'));
    }
    public function showCategoryAveragePriceChart()
    {
        $categories = Category::with('products')
            ->select('categories.name', 
                     DB::raw('AVG(products.price) as average_price'), 
                     DB::raw('MAX(products.price) as max_price'), 
                     DB::raw('MIN(products.price) as min_price'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();

        $chart = new CategoryAveragePriceChart;
        $chart->configure($categories);

        return view('charts.category_average_price', compact('chart'));
    }
    public function showDemoChart()
    {
        $chart = new DemoChart;
        return view('charts.demo', compact('chart'));
    }
    public function showAveragePricesWithFirstLetterCount()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->select('category_id', DB::raw('SUBSTRING(name, 1, 1) as first_letter'), DB::raw('COUNT(*) as product_count'))
                ->groupBy('category_id', 'first_letter');
        }])
        ->select('categories.id', 'categories.name', DB::raw('AVG(products.price) as average_price'), DB::raw('COUNT(products.id) as product_count'))
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->groupBy('categories.id', 'categories.name')
        ->get();

        return view('categories.average_prices_with_first_letter', compact('categories'));
    }
    public function countProductsByFirstLetter()
    {
        $products = Product::select(DB::raw('SUBSTRING(name, 1, 1) as first_letter'), DB::raw('COUNT(*) as product_count'))
            ->groupBy('first_letter')
            ->orderBy('first_letter')
            ->get();

        return view('categories.products_by_first_letter', compact('products'));
    }
    public function showAveragePrices()
    {
        $categories = Category::with('products')
            ->select('categories.name', DB::raw('AVG(products.price) as average_price'), DB::raw('COUNT(products.id) as product_count'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();

        return view('categories.average_prices', compact('categories'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}