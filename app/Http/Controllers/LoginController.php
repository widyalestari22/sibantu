<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == '1') {
                return redirect('staf/dashboard');
            } elseif (Auth::user()->role == '2') {
                return redirect('pkh/dashboard');
            } elseif (Auth::user()->role == '3') {
                return redirect('rt/dashboard');
            }
        } else {
            return redirect('/login')->with('loginError', 'Login Gagal! Username atau password salah');
        }
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     request()->session()->invalidate();
    //     request()->session()->regenerate();
    //     return redirect('/')->with('success', 'Berhasil keluar');
    // }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('/')->with('success', 'Berhasil keluar');
    }
}
