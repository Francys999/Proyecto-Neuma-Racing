<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Variant;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;
use CodersFree\Shoppingcart\Facades\Cart;

Route::get('/', [WelcomeController::class, "index"])->name("welcome.index");

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get("products/{product}", [ProductController::class, "show"])->name("products.show");

Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::get('shipping', [ShippingController::class, 'index'])->name('shipping.index');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::post('checkout/paid', [CheckoutController::class, 'paid'])->name('checkout.paid');

Route::get('gracias', function(){
    return view('gracias');
})->name('gracias');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("prueba", function(){
    
    $order = Order::first();

    $pdf = FacadePdf::loadView('orders.ticket', compact('order'))->setPaper('a5');

    $pdf->save(storage_path('app/public/tickets/ticket-' . $order->id . '.pdf'));

    $order->pdf_path = 'tickets/ticket-' . $order->id . '.pdf';
    $order->save();

});

Route::get('/politica-privacidad', function () {
    return view('politica-privacidad');
})->name('politica-privacidad');

Route::get('/terminos-condiciones', function () {
    return view('terminos-condiciones');
})->name('terminos-condiciones');
