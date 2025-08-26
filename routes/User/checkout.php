<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CheckoutController;


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('session.auth');