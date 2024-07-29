<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return $this->authenticated($request, Auth::user());
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admins')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    public function logout()
    {
        Auth::logout();
    }
}
