<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Models\Berita;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "home",
    ]);
});

Route::get('/profile', function () {
    return view('profile',[
        "title" => "Profile",
        "nama" => "Suci Nento",
        "nohp" => "081244449681",
        "foto" => "images/suci.jpeg",
    ]);
});

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{slug}', [BeritaController::class,'tampildata']);

// Authentication routes
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Admin Setup routes (untuk membuat admin pertama kali)
Route::get('/admin-setup', [\App\Http\Controllers\Auth\AdminSetupController::class, 'showAdminSetupForm'])->name('admin.setup');
Route::post('/admin-setup', [\App\Http\Controllers\Auth\AdminSetupController::class, 'setupAdmin']);

// Forgot Password routes
Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Public mahasiswa routes (dapat dilihat oleh siapa saja)
Route::get('/datamahasiswa', [MahasiswaController::class,'index'])->name('datamahasiswa');
Route::get('/detail/{id}',[MahasiswaController::class, 'detail'])->name('detail');
Route::get('/tampildata/{id}',[MahasiswaController::class, 'tampildata'])->name('tampildata');

// Protected mahasiswa routes (untuk semua yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/tambahmahasiswa', [MahasiswaController::class, 'tambahmahasiswa'])->name('mahasiswa.tambah');
    Route::post('/insertdata', [MahasiswaController::class, 'insertdata'])->name('insertdata');
    Route::post('/editdata/{id}',[MahasiswaController::class, 'editdata'])->name('editdata');
    Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
    
    // My Profile routes
    Route::get('/my-profile', [\App\Http\Controllers\ProfileController::class, 'myProfile'])->name('my-profile');
    Route::get('/edit-profile', [\App\Http\Controllers\ProfileController::class, 'editProfile'])->name('edit-profile');
    Route::post('/update-profile', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('update-profile');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');