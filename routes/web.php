<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;


// Home Page route
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


// Categories Route
Route::resource('categories', CategoriesController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');