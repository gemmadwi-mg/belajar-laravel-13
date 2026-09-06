<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Halaman Utama / Redirect
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource route otomatis mencakup: index, create, store, show, edit, update, destroy
Route::resource('products', ProductController::class);

// 1. Halaman Beranda
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// 2. Halaman Tentand Kami
Route::get('/tentang', function () {
    return view('pages.about');
})->name('about');

// 3. Halaman Layanan
Route::get('/layanan', function () {
    return view('pages.services');
})->name('services');

// 4. Halaman Daftar Item (Katalog)
Route::get('/item', function () {
    $items = [
        ['id' => 1, 'nama' => 'Laptop Gaming', 'harga' => 'Rp 15.000.000', 'deskripsi' => 'Laptop spek tinggi untuk kebutuhan gaming dan desain.'],
        ['id' => 2, 'nama' => 'Smartphone Flagship', 'harga' => 'Rp 12.000.000', 'deskripsi' => 'Kamera jernih dengan performa chipset terbaik.'],
        ['id' => 3, 'nama' => 'Headphone Wireless', 'harga' => 'Rp 2.500.000', 'deskripsi' => 'Fitur noise-cancelling dengan daya tahan baterai 30 jam.'],
    ];

    return view('pages.items.index', compact('items'));
})->name('items.index');

// 5. Halaman Detail Item (Route Parameter)
Route::get('/item/{id}', function ($id) {
    $items = [
        1 => ['nama' => 'Laptop Gaming', 'harga' => 'Rp 15.000.000', 'deskripsi' => 'Laptop spek tinggi untuk kebutuhan gaming dan desain.'],
        2 => ['nama' => 'Smartphone Flagship', 'harga' => 'Rp 12.000.000', 'deskripsi' => 'Kamera jernih dengan performa chipset terbaik.'],
        3 => ['nama' => 'Headphone Wireless', 'harga' => 'Rp 2.500.000', 'deskripsi' => 'Fitur noise-cancelling dengan daya tahan baterai 30 jam.'],
    ];

    abort_if(!array_key_exists($id, $items), 404);

    $item = $items[$id];

    return view('pages.items.show', compact('item', 'id'));
})->name('items.show');
