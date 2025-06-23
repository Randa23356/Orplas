<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SliderController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('dashboard/posts', [PostController::class, 'storePost'])->name('posts.store');
    Route::put('dashboard/posts/{post}', [PostController::class, 'updatePost'])->name('posts.update');
    Route::delete('dashboard/posts/{post}', [PostController::class, 'destroyPost'])->name('posts.destroy');

    Route::post('dashboard/sliders', [PostController::class, 'storeSlider'])->name('sliders.store');
    Route::delete('dashboard/sliders/{slider}', [PostController::class, 'destroySlider'])->name('sliders.destroy');
});

// Tambahkan route admin lain di sini jika perlu

require __DIR__ . '/auth.php';
