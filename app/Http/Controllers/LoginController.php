<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:10',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/tarefas');
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

}