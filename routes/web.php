<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/Article/{article}', [BlogController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [BlogController::class, 'profil'])->name('dashboard');
    Route::get('/nouveau_article', [BlogController::class, 'create'])->name('new.blog');
    Route::post('/dashboard', [BlogController::class, 'store'])->name('store.blog');
    Route::get('/modification_article/{article}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::put('/dashboard/{article}', [BlogController::class, 'update'])->name('update.blog');
    Route::delete('/dashboard/{article}', [BlogController::class, 'destroy'])->name('delete.blog');
    Route::get('/dashboard/comment', [BlogController::class, 'commentIndex'])->name('dashboard.comment');
    Route::post('/dashboard/{article}', [BlogController::class, 'storeComment'])->name('store.comment');
    Route::delete('/dashboard/comment/{comment}', [BlogController::class, 'destroyComment'])->name('delete.comment');
});

require __DIR__.'/auth.php';
