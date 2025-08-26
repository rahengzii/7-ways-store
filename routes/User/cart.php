<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;


Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('session.auth');