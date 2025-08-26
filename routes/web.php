<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () { return redirect('/home'); });


include "User/shop.php";
include "User/home.php";
include "User/cart.php";
include "User/contact.php";
include "User/invoice.php";
include "User/shopDetail.php";
include "User/checkout.php";
include "User/about.php";
include "User/blog.php";
include "User/profile.php";

include "Auth/auth.php";


