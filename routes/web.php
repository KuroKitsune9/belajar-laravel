<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routing Basic
Route::get('about', function () {
    return 'ini Halaman About';
});

Route::get('profile', function () {
    return view('profile');
});

// Routing dengan parameter
Route::get('produk/{a}', function ($a) {
    return 'saya membeli produk <br>' . $a . '</br>';
});

Route::get('beli/{barang}/{jumlah}', function ($a, $b) {
    return view('beli', compact('a', 'b'));
});

Route::get('kategori/{namaKategori?}', function ($nama = null) {
    if ($nama) {
        return 'anda memilih Kategori ' . $nama;
    } else {
        return 'anda belum memilih Kategori';
    }
});

Route::get('kode/{namaBarang?}/{kode?}', function ($a = null, $b = null) {
    return view('kode', compact('a', 'b'));
});