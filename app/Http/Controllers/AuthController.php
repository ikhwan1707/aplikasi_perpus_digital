<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Authentications.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'Email' => 'required|string',
            'Password' => 'required|string',
        ]);

        $user = User::where('Email', $request->input('Email'))->first();
        if ($user && Hash::check($request->input('Password'), $user->Password)) {
            Auth::login($user);
            //dd(Auth::user()->Role);
            return redirect()->intended('/dashboard')->with('success', 'You have Successfully loggedin');
        } else {
            return redirect()->route('login')->with('success', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}