<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/products/create', function () {
    return view('admin.products.create');
});
Route::get('admin/products', function () {
    return view('admin.products.index');
});
