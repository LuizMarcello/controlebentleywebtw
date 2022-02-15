<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
/* use Illuminate\Support\Facades\Auth; */

class HomePage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * Este tipo de controller (invoke) só tem uma única ação(action).
     */
    public function __invoke(Request $request)
    {
        /* Retornando o usuário logado, e enviando para a view. */
        /* Método user() */
        //$user = $request->user();

        /* Também vai retornar o usuário logado, através da façade "Auth". */
        /* Método user() */
        //$user = Auth::user();

        /* Também retornando o usuário logado, através da façade "Auth",
           mas somente o id do mesmo */
        //$user = Auth::id();

        /* Também retornando o usuário logado, agora através do helper "auth". */
        /* Letra minúscula */
        //$user = auth()->id();

        /* Também retornando o usuário logado através do helper "auth". */
        /* Letra minúscula */
        //$user = auth()->user();

        //return view('home', [
            //'userId' => $user
            //'user' => $user
        //]);

        return view('home');
    }
}
