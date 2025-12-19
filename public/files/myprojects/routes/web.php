<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/projects');
});

Auth::routes();

Route::resource('/projects', ProjectController::class);

Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);

Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'update']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::patch('/profile', [ProfileController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
