<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');