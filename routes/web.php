<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/add', [BlogController::class, 'add']);
    Route::post('/blog/create', [BlogController::class, 'create']);
    Route::get('/blog/{id}/detail', [BlogController::class, 'show'])->name('detail-blog');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::patch('/blog/{id}/update', [BlogController::class, 'update']);

    Route::delete('/blog/{id}/delete', [BlogController::class, 'destroy']);

    Route::get('/user', [UserController::class, 'index'])->middleware(EnsureTokenIsValid::class);
    Route::post('/comment/{id}', [CommentController::class, 'store']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
});

Route::get('/upload-image', function () {
    return view('upload-image');
});

Route::post('/upload-image', function (Request $request) {
    $file = $request->file('image');
    $ext = $file->extension();

    $path = Storage::putFileAs('images', $request->file('image'), 'test-upload' . '.' . $ext);
    return $path;
});
