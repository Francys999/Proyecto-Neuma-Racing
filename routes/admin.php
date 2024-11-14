<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("admin.dashboard");
})->name("dashboard");

Route::resource('categories', CategoryController::class);