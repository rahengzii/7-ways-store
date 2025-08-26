<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;


Route::get('/home', [HomeController::class, 'index'])->name('home');