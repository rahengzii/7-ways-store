<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;


Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('session.auth');