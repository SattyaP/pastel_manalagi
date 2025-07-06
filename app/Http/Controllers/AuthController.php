<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function regist_mitra_form()
    {
        return view('auth.regist_mitra');
    }

    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
                'password' => 'Email atau password salah.',
            ]);
        }
    }
}
