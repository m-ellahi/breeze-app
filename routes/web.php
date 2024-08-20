<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // product routes
    
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/add-product',[ProductController::class,'add'])->name('product.add');
    Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'view_product'])->name('view-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product-destroy/{id}', [ProductController::class, 'destroy_product'])->name('product.destroy');

    

    
});

require __DIR__.'/auth.php';
