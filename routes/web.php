<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('queue', function () {
        Artisan::call('queue:work');
    });

    // Route for post
    Route::post('/post-store', [PostController::class, 'store'])->name('post.store');
    Route::get('/get-cache', [PostController::class, 'getCache']);

    // Localization
    Route::get('/dashboard/{lang}', [PostController::class, 'localization']);

});

require __DIR__.'/auth.php';
