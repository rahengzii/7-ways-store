<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\InvoiceController;


Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice')->middleware('session.auth');