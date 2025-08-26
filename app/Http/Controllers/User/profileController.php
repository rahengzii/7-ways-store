<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect()->route('login')->with('error', 'Please login to view profile.');
        }
        return view('components.profile');
    }
}