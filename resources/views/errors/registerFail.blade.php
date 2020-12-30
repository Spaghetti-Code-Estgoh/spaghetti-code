@extends('layouts.auth_layout')

@section('nav')
    <li>
        <a class="btn logNav" href="{{ route('register') }}">{{ __('Registar') }}</a>
    </li>
@endsection

@section('content')
    <div class=" cont-log bg-white">
        <div class="row justify-content-center box-log">
            <div class="col-md-6">
                <img src="https://www.nicepng.com/png/full/129-1294940_dr-whoa-medic-team-fortress-2-medic-png.png">
            </div>
            <div class="col-md-6 align-self-center">
                <h1 class="display-1">IDK</h1>
                <h2 class="display-4">UH OH! Algo correu mal.</h2>
                <p class="display-5">Não foi possível confirmar a sua conta, Isto pode se dever a vários motivos:</p>
                <p class="display-5"><br>A conta não existe</p>
                <p class="display-5"><br>A conta já foi confirmada</p>
                <p class="display-5"><br>A conta já expirou e foi eliminada</p>
                <p class="display-5"><br>Caso tenha algum problema não especificado por favor contacte o serviço ou cliente ou registe se novamente na aplicação</p>
                <a href="/"><button class="btn-dark">HOME</button></a>
            </div>
        </div>
    </div>
@endsection
