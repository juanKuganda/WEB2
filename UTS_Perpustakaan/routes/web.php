<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\ControllerPenjaga;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::middleware('auth')->group(function(){
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  // Anggota
  Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota.index');
  Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
  Route::post('anggota', [AnggotaController::class, 'store'])->name('anggota.store');
  Route::get('anggota/{anggotum}', [AnggotaController::class, 'show'])->name('anggota.show');
  Route::get('anggota/{anggotum}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
  Route::put('anggota/{anggotum}', [AnggotaController::class, 'update'])->name('anggota.update');
  Route::delete('anggota/{anggotum}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

  // Penjaga
  Route::get('penjaga', [ControllerPenjaga::class, 'index'])->name('penjaga.index');
  Route::get('penjaga/create', [ControllerPenjaga::class, 'create'])->name('penjaga.create');
  Route::post('penjaga', [ControllerPenjaga::class, 'store'])->name('penjaga.store');
  Route::get('penjaga/{penjaga}', [ControllerPenjaga::class, 'show'])->name('penjaga.show');
  Route::get('penjaga/{penjaga}/edit', [ControllerPenjaga::class, 'edit'])->name('penjaga.edit');
  Route::put('penjaga/{penjaga}', [ControllerPenjaga::class, 'update'])->name('penjaga.update');
  Route::delete('penjaga/{penjaga}', [ControllerPenjaga::class, 'destroy'])->name('penjaga.destroy');
  
  // Buku
  Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
  Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
  Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
  Route::get('buku/{buku}', [BukuController::class, 'show'])->name('buku.show');
  Route::get('buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
  Route::put('buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
  Route::delete('buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
  
  // Category
  Route::get('category', [CatergoryController::class, 'index'])->name('category.index');
  Route::get('category/create', [CatergoryController::class, 'create'])->name('category.create');
  Route::post('category', [CatergoryController::class, 'store'])->name('category.store');
  Route::delete('category/{category}', [CatergoryController::class, 'destroy'])->name('category.destroy');
  // Peminjaman
  Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
  Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
  Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
  Route::get('peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
  Route::get('peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
  Route::put('peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
  Route::delete('peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
  Route::get('peminjaman/{peminjaman}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');
});
