<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProgectController;
use App\Models\Task;    
use App\http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/progects', ProgectController::class)->middleware('auth');

Route::post('/progects/{progect}/tasks', [TaskController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
