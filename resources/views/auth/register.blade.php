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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">


                                    <img class="imagem" src="img/imagemDefault.png"  alt="Imagem de perfil" id="imagem">
                                    <input type="file" name="fotografia"  class="custom-file-input" id="escolherFotografia" aria-describedby="inputGroupFileAddon01" onchange="mudarFotografia(event)">
                                    <label class="custom-file-label input_fotografia" for="escolherFotografia"  data-browse="Pesquisar" >{{ __('Escolha uma Fotografia') }}</label>
                                    @error('fotografia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{-- Nome--}}<br>
                                    <label for="name" class="col-form-label text-md-right" style="margin-top: 2.9rem">{{ __('Nome Completo') }}</label>
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
                                    <input id="nif" type="text" pattern="[0-9]{9}" class="form-control @error('nif') is-invalid @enderror" name="nif" required autocomplete="nif">

                                    @error('nif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{-- Morada--}}
                                    <label for="morada" class=" col-form-label text-md-right">{{ __('Morada') }}</label>
                                    <input id="morada" type="text" class="form-control @error('morada') is-invalid @enderror" name="morada" required autocomplete="morada">

                                    @error('morada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                    {{-- Gênero--}}
                                    <label for="genero" class=" col-form-label text-md-right">{{ __('Gênero') }}</label><br>
                                    <select name="genero" class="custom-select" id="genero">
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

<script>

    function mudarFotografia(event) {

            let imagem = document.getElementById("imagem");
            imagem.src = URL.createObjectURL(event.target.files[0]);

    }

</script>

@endsection
