@extends('layouts.auth_layout')

@section('nav')
    <li class="">
        <a class="btn logNav " href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endsection

@section('content')
    <div class="container cont-log">
        <div class="row justify-content-center box-log">
            <div class="col-md-10">
                <div class="row" style="justify-content: center; text-align: center">
                    <div class="text-header">{{ __('Pedido de alteração de Password Realizado!') }}</div>
                    <br>
                    <br>

                    <div class="card-body">
                        <h4 class="white">Enviamos lhe um email para MAIL_NAME <br> caso em 48 horas não aceda ao link enviado
                        a sua password não será alterada</h4>
                    </div>

                    <a class="btn submitInput" href="/">
                        Voltar a Página Principal
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
