<?php

use App\Http\Controllers\ParkirController;
use App\Http\Controllers\ProfileController;
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
});

require __DIR__.'/auth.php';

Route::get('/parkir', [ParkirController::class, 'index'])->name('parkir');

Route::controller(ParkirController::class)->group(function () {
    Route::get('/parkir', 'index')->name('parkir');
    Route::get('/parkir/buat', 'create')->name('parkir.create');
    Route::post('/parkir', 'store')->name('parkir.store');
    Route::get('/parkir/edit/{id}', 'edit')->name('parkir.edit');
    Route::put('/parkir/{id}', 'update')->name('parkir.update');
    Route::delete('/parkir/{id}', 'destroy')->name('parkir.destroy');
});

