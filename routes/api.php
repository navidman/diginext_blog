<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('user', [\App\Http\Controllers\UserController::class, 'store'])->name('user.create');
Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('post', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

