<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ContactController;


Route::get('/contact', [ContactController::class, 'index'])->name('contact');