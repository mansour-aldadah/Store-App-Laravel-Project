<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
});


Route::get('/', [FrontController::class, 'index'])->name('home.front');



Route::middleware('auth')->get('/back', function () {
    return view('layouts.admin');
})->name('home.back');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
