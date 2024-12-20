<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("admin.dashboard");
})->middleware('can:access dashboard')
    ->name("dashboard");

Route::get("/options", [OptionController::class, "index"])->name("options.index");

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('products/{product}/variants/{variant}', [ProductController::class, 'variants'])
    ->name('products.variants')
    ->scopeBindings();

Route::put('products/{product}/variants/{variant}', [ProductController::class, 'variantsUpdate'])
    ->name('products.variantsUpdate')
    ->scopeBindings();

Route::resource('covers', CoverController::class);

Route::resource('drivers', DriverController::class);

Route::get('shipments', [ShipmentController::class, 'index'])
    ->name('shipments.index');

Route::get('orders', [OrderController::class, 'index'])
    ->name('orders.index');
