<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('profile', [AuthController::class, 'me']);
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts/{post}/like', [PostController::class, 'like']);
    Route::post('posts/{post}/comment', [PostController::class, 'comment']);
    Route::post('follow/{user}', [UserController::class, 'follow']);
});
