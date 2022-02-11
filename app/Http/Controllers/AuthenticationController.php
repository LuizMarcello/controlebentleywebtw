<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logar(Request $request)
    {
        /* Validando as informações preenchidas */
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        /* Método específico do laravel, para logar:
           É um "façade" */
        if (Auth::attempt($dados)) {
            /* Quando logar, é sempre uma boa prática do laravel, dar um regenerate na sessão */
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'O email e/ou senha não são válidos'
        ]);
    }
}
