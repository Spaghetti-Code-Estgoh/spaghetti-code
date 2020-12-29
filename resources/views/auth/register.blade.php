@extends('layouts.auth_layout')

@section('nav')
    <li class="">
        <a class="btn logNav " href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endsection

@section('content')
<div class="section-registo" >
    <div class="container" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-registo middle">
                    <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Registo') }}</div>

                    <div class="card-body" style="padding-top: 2rem">
                        <form method="POST" action="{{ route('registo.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">


                                    <img class="imagem" src="{{asset('img/imgDefault.jpg')}}"  alt="Imagem de perfil" id="imagem">
                                    <input type="file" name="fotografia"  class="custom-file-input" id="escolherFotografia" aria-describedby="inputGroupFileAddon01" onchange="mudarFotografia(event)">
                                    <label class="custom-file-label input_fotografia" for="escolherFotografia"  data-browse="Pesquisar" >{{ __('Escolha uma Fotografia') }}</label>
                                    @error('fotografia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{-- Nome--}}<br>
                                    <label for="nome" class="col-form-label text-md-right" style="margin-top: 2.9rem">{{ __('Nome Completo') }}</label>
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                    @error('nome')
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
                                    <input id="contacto" type="tel" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto" value="{{ old('contacto') }}">

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


                                    {{-- NSS--}}
                                    <label for="nss" class=" col-form-label text-md-right">{{ __('NSS') }}</label>
                                    <input id="nss" type="text" class="form-control @error('nss') is-invalid @enderror" name="nss" value="{{ old('nss') }}" required autocomplete="nss">

                                    @error('nss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                    {{-- NIF--}}
                                    <label for="nif" class=" col-form-label text-md-right">{{ __('NIF') }}</label>
                                    <input id="nif" type="text" pattern="[0-9]{9}" class="form-control @error('nif') is-invalid @enderror" name="nif" required autocomplete="nif" value="{{ old('nif') }}">

                                    @error('nif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{-- Morada--}}
                                    <label for="morada" class=" col-form-label text-md-right">{{ __('Morada') }}</label>
                                    <input id="morada" type="text" class="form-control @error('morada') is-invalid @enderror" name="morada" required autocomplete="morada" value="{{ old('morada') }}">

                                    @error('morada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    {{-- Gênero--}}
                                    <label for="genero" class=" col-form-label text-md-right">{{ __('Gênero') }}</label><br>
                                    <select name="genero" class="custom-select" id="genero" value="{{ old('genero') }}">
                                        <option>{{ __('Escolher') }}</option>
                                        <option value="masculino">{{ __('Masculino') }}</option>
                                        <option value="feminino">{{ __('Feminino') }}</option>
                                        <option value="outro">{{ __('Outro') }}</option>

                                    </select>
{{--                                    <input type="radio" id="masculino" name="genero" value="masculino" required autocomplete="genero">--}}
{{--                                    <label for="masculino">{{ __('Masculino') }}</label><br>--}}
{{--                                    <input type="radio" id="feminino" name="genero" value="feminino" required autocomplete="genero">--}}
{{--                                    <label for="feminino">{{ __('Feminino') }}</label><br>--}}
{{--                                    <input type="radio" id="outro" name="genero" value="outro" required autocomplete="genero">--}}
{{--                                    <label for="outro">{{ __('Outro') }}</label>--}}

                                    @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

<!-- DEBUG ONLY
    TODO: remove this
    #Author: Afonso Vitório -->
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<script>

    //Author: Guilherme Jafar
    function mudarFotografia(event) {

            let imagem = document.getElementById("imagem");
            imagem.src = URL.createObjectURL(event.target.files[0]);

    }

</script>

@endsection
