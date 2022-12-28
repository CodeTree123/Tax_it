<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.login');
    }

    public function login(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth()->user()->role_id;
            if ($user == 1) {
                return redirect()->route('dashboard')->with('success', 'Admin Login Successfully');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credential');
        }
    }
    public function dashboard()
    {
        return view('layout.dashboard');
    }
}
