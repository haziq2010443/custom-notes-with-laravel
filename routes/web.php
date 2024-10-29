<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class,'welcome'])->name('welcome');

Route::redirect('/', '/note')->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    //Simplified way of routing
    Route::resource('note', NoteController::class);
    //The comprehensive way of routing
    // Route::get('/note', [NoteController::class,'index'])->name('note.index');
    // Route::get('/note/create', [NoteController::class,'create'])->name('note.create');
    // Route::post('/note/{id}', [NoteController::class,'store'])->name('note.store');
    // Route::get('/note/{id}', [NoteController::class,'show'])->name('note.show');
    // Route::get('/note/{id}/edit', [NoteController::class,'edit'])->name('note.edit');
    // Route::put('/note/{id}', [NoteController::class,'update'])->name('note.update');
    // Route::delete('/note/{id}', [NoteController::class,'destroy'])->name('note.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
