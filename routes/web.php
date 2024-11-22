<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;

Route::get('/', [WelcomeController::class, "index"])->name("welcome.index");

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get("products/{product}", [ProductController::class, "show"])->name("products.show");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

