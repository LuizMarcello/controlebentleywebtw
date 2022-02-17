<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Mostrar o formulário de cadastro de usuários
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('auth.register');
    }


    /**
     * Realiza a criação do usuário no banco de dados
     *
     *@return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        /* Validando os dados para salvar: */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        /* Método "only()" retorna um array */
        /* "hasheando" a senha no banco de dados */
        $dados = $request->only(['name', 'email', 'password']);
        $dados['password'] = Hash::make($dados['password']);

        User::create($dados);

        return redirect()->route('home');
    }
}
