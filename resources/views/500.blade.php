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
            <h1 class="display-1">500</h1>
            <h2 class="display-3">UH OH! Algo correu mal.</h2>
            <p class="display-4">Internal Server Error...
            </p>
            <a href="/"><button class="btn-dark">HOME</button></a>
        </div>
    </div>
</div>
@endsection
