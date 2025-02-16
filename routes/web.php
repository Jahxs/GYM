<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembresiaController;
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
    Route::resource('membresias', MembresiaController::class);
    Route::post('membresias/{membresia}/registrar-visita', [MembresiaController::class, 'registrarVisita'])
        ->name('membresias.registrar-visita');
});

require __DIR__.'/auth.php';
