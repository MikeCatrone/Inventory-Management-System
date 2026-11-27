<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home Page route
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Categories Routes
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

// Items Routes
Route::get('/items/create', [ItemsController::class, 'create'])->name('items.create');
Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
Route::get('/items/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit');
Route::patch('/items/{item}', [ItemsController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemsController::class, 'destroy'])->name('items.destroy');