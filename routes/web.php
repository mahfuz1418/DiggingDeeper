<?php

use App\Http\Controllers\ClientController;
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

    // HTTP Client Controller
    Route::get('/http-client', [ClientController::class, 'httpClient'])->name('client.index');
    Route::get('/create-client', [ClientController::class, 'createClient'])->name('client.create');
    Route::post('/store-client', [ClientController::class, 'storeClient'])->name('client.store');
    Route::get('/show-client/{id}', [ClientController::class, 'showClient'])->name('client.show');
    Route::get('/edit-client/{id}', [ClientController::class, 'editClient'])->name('client.edit');
    Route::post('/update-client', [ClientController::class, 'updateClient'])->name('client.update');
    Route::get('/delete-post/{id}', [ClientController::class, 'deleteClient'])->name('client.delete');


});

require __DIR__.'/auth.php';
