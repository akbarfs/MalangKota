<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //use AuthenticatesUsers;
    public function index()
    {
        if ( Auth::check() ) {
            return redirect('/profil');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        //validasi
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('profil');
        }else {
            return redirect()->back()->
            with('status','Email dan Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
