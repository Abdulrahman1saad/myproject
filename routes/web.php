<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProgectController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/progects', ProgectController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
