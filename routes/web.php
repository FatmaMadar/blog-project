<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('blogs', BlogController::class);

Route::get('/user/{id}', function ($id) {
    return 'المستخدم رقم: ' . $id;
})->name('user.id');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

