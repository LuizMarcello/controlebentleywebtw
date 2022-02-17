<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Mostra o formulário de login
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function login()
    {
        return view('auth.login');
    }


    /**
     * Realiza login com os dados enviados
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logar(Request $request)
    {
        /*  dd($request->remember); */

        /* Validando as informações preenchidas */
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        /* attempt(): Método específico do laravel, para logar: É um "façade" */
        /* filled(): Método que verifica se o campo "remember" do formulário de logar
           está preenchido. Se "on" retorna "true", se "null" retorna "false". */
        if (Auth::attempt($dados, $request->filled('remember'))) {
            /* Quando logar, é sempre uma boa prática do laravel, dar um regenerate na sessão */
            $request->session()->regenerate();

            /* Função intended(): */
            /* Função de redirecionamento para a URL anterior, antes do login. */
            /* "home" no caso, é uma URI de retaguarda. */
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'O email e/ou senha não são válidos'
        ]);
    }


    /**
     * Realiza logout do usuário
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        /* Usanso a façade Auth() e o método logout() */
        Auth::logout();
        /* Usando o laravel helper session() e: */
        /* Invalidando a sessão, e: */
        $request->session()->invalidate();
        /* Invalidando o token csfr */
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
