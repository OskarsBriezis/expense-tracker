<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);
Route::resource('expenses', ExpenseController::class);
Route::get('expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');

Route::get('/', function () {
    return view('welcome');
});
