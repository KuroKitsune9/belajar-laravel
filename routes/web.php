<?php

use App\Http\Controllers\MyController;
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

// Route Siswa
Route::get('siswa', [MyController::class, 'index']);
// Create
Route::get('/siswa/create', [MyController::class, 'create']);
Route::post('/siswa', [MyController::class, 'store']);
// show
Route::get('siswa/{id}', [MyController::class, 'show']);

// edit data
Route::get('siswa/{id}/edit', [MyController::class, 'edit']);
Route::put('/siswa/{id}', [MyController::class, 'update']);

Route::delete('siswa/{id}', [MyController::class, 'destroy']);
