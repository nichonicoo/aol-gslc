<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MoviesController::class, 'home'])->name('movies.home');

Route::get('/input', [MoviesController::class, 'create'])->name('movies.create');
Route::post('/movie', [MoviesController::class, 'store'])->name('movies.store');

Route::delete('/{movies}/delete', [MoviesController::class, 'delete'])->name('movies.delete');
