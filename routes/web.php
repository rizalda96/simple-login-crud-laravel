<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['web', 'auth'])->get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::post('/pengguna/search', [PenggunaController::class, 'search'])->name('pengguna.search');
Route::get('/pengguna/tambah', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::post('/pengguna/save', [PenggunaController::class, 'save'])->name('pengguna.save');
Route::delete('/pengguna/remove/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');
Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::patch('/pengguna/update', [PenggunaController::class, 'update'])->name('pengguna.update');
