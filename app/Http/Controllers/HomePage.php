<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('home');
    }
}
