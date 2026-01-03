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

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/products/{id}', function ($id) {
    $products = include app_path('Data/ProductData.php');

    if (!isset($products[$id])) abort(404);

    $product = $products[$id];

    $related = collect($products)
        ->except($id)
        ->take(3);

    return view('products.show', compact('product', 'id', 'related'));
})->name('products.show');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
