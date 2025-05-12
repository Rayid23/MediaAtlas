<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/admin-dashboard', [HomeController::class, 'adminIndex'])->name('admin.dashboard');
    Route::resource('authors', AuthorsController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
