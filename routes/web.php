<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controlers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/aboutme', function () {
    return view('aboutme');
});

//route untuk berita
Route::get('/berita', [BeritaController::class, 'index'])->name( 'berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

//route untuk data mahasiswa
Route::get('/datamahasiswa', [MahasiswaController::class, 'index' ]);


