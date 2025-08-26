<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect()->route('login')->with('error', 'Please login to view invoices.');
        }
        $module = 'contact';
        return view('components.contact', ['module' => $module]);
    }
}