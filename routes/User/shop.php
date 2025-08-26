<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ShopController;

Route::get('/shop', [ShopController::class, 'index'])->name('shop')->middleware('session.auth');