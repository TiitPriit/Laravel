<?php

use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/charts/demo', [CategoryController::class, 'showDemoChart']);
Route::get('/categories/average-prices', [CategoryController::class, 'showAveragePrices']);
Route::get('/products/count-by-first-letter', [CategoryController::class, 'countProductsByFirstLetter']);
Route::get('/categories/average-prices-with-first-letter', [CategoryController::class, 'showAveragePricesWithFirstLetterCount']);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('trees', TreeController::class);
Route::get('/test', test::class);
Route::get('/', function () {
    return view('welcome');
});

