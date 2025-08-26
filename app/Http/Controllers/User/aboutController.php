<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect()->route('login')->with('error', 'Please login to view invoices.');
        }
        $module = 'about';
        return view('components.about', ['module' => $module]);
    }
}

