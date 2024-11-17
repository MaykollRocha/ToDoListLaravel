<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AfazerController;
use App\Http\Controllers\DastboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DastboardController::class, 'index'])->name('dashboard.index');
});
//Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Afazeres
Route::middleware('auth')->group(function () {
    Route::get('/afazeres', [AfazerController::class, 'index'])->name('afazer.index');
    Route::get('/afazeres/create', [AfazerController::class, 'create'])->name('afazer.create');
    Route::post('/afazeres', [AfazerController::class, 'store'])->name('afazer.store');
    Route::get('/afazeres/{id}/edit', [AfazerController::class, 'edit'])->name('afazer.edit');
    Route::put('/afazeres/{id}/', [AfazerController::class, 'update'])->name('afazer.update');
    Route::get('/afazeres/{id}/', [AfazerController::class, 'show'])->name('afazer.show');
    Route::delete('/afazeres/{id}/', [AfazerController::class, 'delete'])->name('afazer.delete');
});

require __DIR__.'/auth.php';
