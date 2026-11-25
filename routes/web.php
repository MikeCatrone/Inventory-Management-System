<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;


// Home Page route
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


// Categories Route
Route::resource('categories', CategoriesController::class);


// Items Route
Route::resource('items', ItemsController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');