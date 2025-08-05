<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/add', [BlogController::class, 'add']);
Route::post('/blog/create', [BlogController::class, 'create']);

Route::get('/blog/{id}/detail', [BlogController::class, 'show']);
Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
Route::patch('/blog/{id}/update', [BlogController::class, 'update']);

Route::delete('/blog/{id}/delete', [BlogController::class, 'destroy']);
