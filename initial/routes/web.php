<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Studentcontroller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');


Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/students', [Studentcontroller::class, 'index'])->name('students.index');
    Route::get('/students/add', [Studentcontroller::class, 'create'])->name('students.add');
    Route::post('/students', [Studentcontroller::class, 'store'])->name('students.store');
    Route::get('/student/{id}', [Studentcontroller::class, 'show'])->name('students.show');
    Route::get('/student/{id}/edit', [Studentcontroller::class, 'edit'])->name('students.edit');
    Route::put('/student/{id}', [Studentcontroller::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [Studentcontroller::class, 'destroy'])->name('students.destroy');
    
    Route::post('/majors', [MajorController::class, 'store'])->name('majors.store');
    Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('majors.create');
    Route::put('/major/{id}', [Majorcontroller::class, 'update'])->name('major.update');
    Route::get('/majors/{id}', [MajorController::class, 'show'])->name('majors.show');
    Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('majors.edit');
    Route::delete('/major/{id}', [Majorcontroller::class, 'destroy'])->name('major.destroy');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
