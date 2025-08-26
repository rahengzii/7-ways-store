<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AboutController;


Route::get('/about', [AboutController::class, 'index'])->name('about');