<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\shopDetailContoller;
use App\Http\Controllers\User\ShopController;


// Route::get('/shop-detail', [shopDetailContoller::class, 'index'])->name('shop-detail');
Route::get('/shop-detail', [shopDetailContoller::class, 'index'])->name('shop.detail');


