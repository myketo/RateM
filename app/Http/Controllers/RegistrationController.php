<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        if(auth()->check()) return redirect('/');
        
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::create($validated);
        Auth::login($user);

        return redirect('/');
    }
}
