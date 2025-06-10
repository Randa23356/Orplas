<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
