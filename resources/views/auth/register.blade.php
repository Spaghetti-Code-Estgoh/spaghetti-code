@extends('layouts.auth_layout')

@section('nav')
    <li class="">
        <a class="btn logNav " href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endsection

@section('content')
<section class="section-registo" >
    <div class="container" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-registo middle">
                    <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Registo') }}</div>

                    <div class="card-body" style="padding-top: 10rem">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {{-- Nome--}}
                                    <label for="name" class="col-form-label text-md-right">{{ __('Nome Completo') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    {{-- Data de Nascimento--}}
                                    <label for="dataNascimento" class=" col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>
                                    <input id="dataNascimento" type="date" class="form-control @error('dataNascimento') is-invalid @enderror" name="dataNascimento" value="{{ old('dataNascimento') }}" required >

                                    @error('dataNascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    {{-- Email--}}
                                    <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    {{-- Contacto--}}
                                    <label for="contacto" class=" col-form-label text-md-right">{{ __('Contacto') }}</label>
                                    <input id="contacto" type="tel" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto">

                                    @error('contacto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>


                                <div class="col-md-6">
                                    {{-- Password--}}
                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    {{-- Confirmar password--}}
                                    <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirmar Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                                    {{-- NSNS--}}
                                    <label for="nsns" class=" col-form-label text-md-right">{{ __('NSNS') }}</label>
                                    <input id="nsns" type="text" class="form-control @error('nsns') is-invalid @enderror" name="nsns" value="{{ old('nsns') }}" required autocomplete="nsns">

                                    @error('nsns')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    {{-- NIF--}}
                                    <label for="nif" class=" col-form-label text-md-right">{{ __('NIF') }}</label>
                                    <input id="nif" type="number" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto">

                                    @error('contacto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-12 mx-auto text-center" style="padding-top: 10rem">
                                    <button type="submit" class="btn btn-primary btn-registo">
                                        {{ __('Registar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
