<?php

use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\pakaiancontroller;
use App\Http\Controllers\pembelicontroller;
use App\Http\Controllers\transaksicontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pakaian', [pakaiancontroller::class, 'index'])->name('Pakaian.index'); 
Route::post('/pakaian', [pakaiancontroller::class, 'store'])->name('Pakaian.store'); 
Route::get('/pakaian/add', function (){
    return view('Pakaian.create');
})->name('Pakaian.add'); 
Route::get('/pembeli/add', function (){
    return view('Pembeli.create');
})->name('Pembeli.add'); 
Route::post('/pembeli', [pembelicontroller::class, 'store'])->name('Pembeli.store'); 
Route::get('/pembeli', [pembelicontroller::class, 'index'])->name('Pembeli.index'); 
Route::get('/transaksi', [transaksicontroller::class, 'index'])->name('Transaksi.index'); 
Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard'); 