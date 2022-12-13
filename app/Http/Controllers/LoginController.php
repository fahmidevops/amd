<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]); // di dalam folder resource ada folder login -> berisi file index.blade.php
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) { //jika percobaan login dari variabel credentials itu berhasil
            $request->session()->regenerate(); //berfungsi untuk menghindari teknik kejahatan session fixation yang digunakan dari session yg lama
            return redirect()->intended('/dashboard'); //intended berfungsi untuk melewati midleware terlebih dahulu sebelum masuk ke dashboard
        }

        return back()->with('loginError', 'Login failed!');

        // dd('berhasil login');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); //supaya tidak bisa di pakai
        $request->session()->regenerateToken(); //supaya gak dibajak
        return redirect('/login'); //balikin mau ke halaman mana
    }
}
