<?php

use App\Http\Controllers\PhoneBookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhoneBookController::class, 'index'])->name('homepage');
Route::post('/', [PhoneBookController::class, 'store'])->name('phonebook.store');
Route::delete('delete/{id}', [PhoneBookController::class, 'destroy'])->name('phonebook.delete');
Route::put('/phonebook/{id}', [PhoneBookController::class, 'update'])->name('phonebook.update');
Route::get('/phonebook/{id}/edit', [PhoneBookController::class, 'edit'])->name('phonebook.edit');
