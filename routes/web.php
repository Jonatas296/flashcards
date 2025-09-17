<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\HistoryController;
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

    Route::resource('/deck', DeckController::class);
    Route::get('/deck/{deck}/cards', [CardController::class, 'cardsByDeck'])->name('deck.cards');


    Route::resource('/card', CardController::class);
    
    Route::get('/study', [HistoryController::class, 'index'])->name('study.all');
    Route::get('/study/{card}/show_back', [HistoryController::class, 'showBack'])->name('study.show_back');
    Route::post('/history', [HistoryController::class, 'store'])->name('history.store');
});

require __DIR__.'/auth.php';

