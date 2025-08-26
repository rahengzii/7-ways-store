<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

   class AuthController extends Controller
   {
       public function login()
       {
           if (Session::has('user')) {
               return redirect()->route('home');
           }
           $module = 'login';
           return view('components.auth.login', ['module' => $module]);
       }

       public function doLogin(Request $request)
       {
           $request->validate([
               'email' => 'required|email',
               'password' => 'required',
           ]);
           Session::put('user', ['email' => $request->email, 'name' => explode('@', $request->email)[0]]);
           return redirect()->route('home')->with('success', 'Logged in successfully!');
       }

       public function register()
       {
           if (Session::has('user')) {
               return redirect()->route('home');
           }
           return view('components.auth.register');
       }

       public function doRegister(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'email' => 'required|email',
               'password' => 'required',
           ]);
           Session::put('user', ['email' => $request->email, 'name' => $request->name]);
           return redirect()->route('login')->with('success', 'Registered successfully! Please login.');
       }

       public function logout(Request $request)
       {
           Session::forget('user');
           return redirect()->route('login')->with('success', 'Logged out successfully!');
       }
   }