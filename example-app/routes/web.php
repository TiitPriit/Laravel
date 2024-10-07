<?php

use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('trees', TreeController::class);
Route::get('/test', test::class);
Route::get('/', function () {
    return view('welcome');
});

