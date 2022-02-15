@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        {{-- {{ $user->name }} está logado --}}

                        {{-- {{ $userId }} está logado --}}

                        {{-- Ou não enviando nada do controler para a view, e
                             usando o helper "auth()" diretamente aqui. --}}
                       {{--  {{ auth()->user()->name }} está logado --}}
                       O usuário está logado.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
