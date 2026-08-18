<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('blogs', BlogController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
require __DIR__.'/auth.php';