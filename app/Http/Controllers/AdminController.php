<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('project_management.pages.login.register');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required',
            'password' => 'required|string',
        ]);

        $admin = Admin::create($validated);
        return redirect()->route('login')->with('success', 'Employee add successfully');
    }
    public function login()
    {
        return view('project_management.pages.login.login');
    }
    // public function loginUser(Request $request)
    // {
    //     $validated = $request->only('email', 'password');
    //     auth::guard('admin');
    // }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))

            $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'Login successful');
    }

    public function logoutUser(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
