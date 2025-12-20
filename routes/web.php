<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/products/{id}', function ($id) {

    $products = include app_path('Data/ProductData.php');

    abort_if(!isset($products[$id]), 404);

    $product = $products[$id];

    // 🔥 FILTER RELATED PRODUCTS
    $related = collect($products)
    ->filter(function ($p, $key) use ($product, $id) {
        return $key != $id && $p['category'] === $product['category'];
    })
    ->take(3);

    return view('products.show', compact('product', 'related'));
});
