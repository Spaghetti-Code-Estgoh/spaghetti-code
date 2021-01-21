@extends('admin/layout')
{{-- //Author: Guilherme Jafar--}}
@section('content')

<!-- 
Redirect para homepage caso não seja o admin
Autor: Afonso Vitório
-->
@if (session('tipo_conta') != 2)
<script> setTimeout(function(){window.location='/home'}); </script>

@endif


    <div class="section-registo" >
        <div class="container" style="height: 100vh;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-registo middle">
                        <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Inserir Funcionarios') }}</div>

                        <div class="card-body" style="padding-top: 2rem">
                            <form method="POST" action="{{ route('registofuncionario.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <br>
                                    <div class="col-md-6">
                                        {{-- Nome--}}
                                        <label for="nome" class="col-form-label text-md-right">{{ __('Nome Completo') }}</label>
                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                        @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                        <label for="utilizador" class=" col-form-label text-md-right">{{ __('Tipo de utilizador') }}</label><br>
                                        <select name="utilizador" class="custom-select" id="utilizador" value="{{ old('utilizador') }}">
                                            <option>{{ __('Escolher') }}</option>
                                            <option value="medico">{{ __('Medico') }}</option>
                                            <option value="funcionario">{{ __('Funcionario') }}</option>
                                            <option value="admin">{{ __('Adminstrador') }}</option>

                                        </select>

                                        @error('utilizador')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                        {{-- Password--}}
                                        <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        {{-- Email--}}
                                        <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror


                                        {{-- Contacto--}}
                                        <label for="contacto" class=" col-form-label text-md-right">{{ __('Contacto') }}</label>
                                        <input id="contacto" type="tel" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto" value="{{ old('contacto') }}">

                                        @error('contacto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror


                                        {{-- Confirmar password--}}
                                        <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirmar Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mx-auto text-center" >
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
    </div>


@endsection
