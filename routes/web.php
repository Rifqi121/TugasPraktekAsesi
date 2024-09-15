<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;


Route::get('/', [BeasiswaController::class, 'index'])->name('home');
Route::get('/form', [BeasiswaController::class, 'create'])->name('form');
Route::post('/submit', [BeasiswaController::class, 'store'])->name('submit');
Route::get('/hasil', [BeasiswaController::class, 'hasil'])->name('hasil');
