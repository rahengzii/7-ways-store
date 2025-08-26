<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;


Route::get('/blog', [BlogController::class, 'index'])->name('blog');