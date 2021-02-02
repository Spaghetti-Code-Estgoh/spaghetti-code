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
        <div class="" >
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div style="padding-top: 2rem">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger alert-dismissible show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-registo middle">
                        <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Inserir Medicos') }}</div>

                        <div class="card-body" style="padding-top: 2rem">
                            <form method="POST" action="{{ route('storeMedico') }}" enctype="multipart/form-data">
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
                                        <select name="utilizador" class="custom-select" id="utilizador" value="{{ old('utilizador') }}" disabled>
                                            <option>{{ __('Escolher') }}</option>
                                            <option value="medico" selected>{{ __('Medico') }}</option>
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

                                    <div class="col-md-6">
                                        {{-- Especialidade--}}
                                        <label for="esp" class="col-form-label text-md-right">{{ __('Especialidade') }}</label>
                                        <input id="esp" type="text" class="form-control @error('esp') is-invalid @enderror" name="esp" value="{{ old('esp') }}" required autocomplete="esp">
                                        @error('esp')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                        {{-- NIF--}}
                                        <label for="nif" class=" col-form-label text-md-right">{{ __('NIF') }}</label>
                                        <input id="nif" type="text" pattern="[0-9]{9}" class="form-control @error('nif') is-invalid @enderror" name="nif" required autocomplete="nif" value="{{ old('nif') }}">

                                        @error('nif')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        {{-- Cedula--}}
                                        <label for="ced" class="col-form-label text-md-right">{{ __('Número Cédula') }}</label>
                                        <input id="ced" type="number" class="form-control @error('ced') is-invalid @enderror" name="ced" value="{{ old('ced') }}" required autocomplete="esp">
                                        @error('ced')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                        <input type="file" name="fotografia"  class="custom-file-input" id="escolherFotografia" aria-describedby="inputGroupFileAddon01" onchange="mudarFotografia(event)">
                                        <label class="custom-file-label input_fotografia" for="escolherFotografia"  data-browse="Pesquisar" >{{ __('Escolha uma Fotografia') }}</label>
                                        @error('fotografia')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <img class="imagem" src="{{asset('img/imgDefault.jpg')}}"  alt="Imagem de perfil" id="imagem">
                                    </div>

                                </div>
                                {{ __('Registar') }}

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mx-auto text-center" >
                                        <button type="submit" class="btn btn-primary btn-registo" style="width: 100%">
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

    @if(Session::has('status'))

        <script >alert("Registo criado com sucesso!");</script>
    @endif

    <script src="{{ asset('js/components/imageUpload.js')}}"></script>
@endsection
