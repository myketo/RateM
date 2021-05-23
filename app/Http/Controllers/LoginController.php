<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if(auth()->check()) return redirect('/');
        
        return view('login.create');
    }

    public function store(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'message' => 'The email or password is incorrect, please try again'
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
