<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $loginAttempt =  (Auth::attempt($credentials));

        if (!$loginAttempt) {
            return redirect()->back();
        }
        $user = Auth::user();

        if ($user->role === "Member") {
            return redirect()->intended('/')->with('login','Selamat Anda berhasil masuk');
        } elseif ($user->role === "Admin") {
            return redirect()->intended('/admin/dashboard')->with('login','Selamat Anda berhasil masuk');
        } 
        return redirect('/blank');
    }
    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('logout', 'Berhasil Logout');
    }
}
