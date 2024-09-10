<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;

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

Route::post('/createcarro', [CarroController::class, 'create']);
Route::get('/excluir/{id}', [CarroController::class, 'excluir']);
Route::get('/dashboard', [CarroController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';


Route::get('/atualizar', function () {
    return view('atualizacao');
});