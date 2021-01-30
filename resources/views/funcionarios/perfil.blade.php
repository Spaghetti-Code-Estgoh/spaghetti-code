@extends('funcionarios/layout')
{{-- //Author: Rafael Pais--}}

@section('content')
    <div class="section-registo" >
        <div class="">
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
                        <div class="card-body" style="padding-top: 2rem">
                            <form method="POST" action="{{ route('alterarFuncionario') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-12">

                                        <img class="imagem" src="{{url('images/') . "/" . session('imagePath')}}" alt="Imagem de perfil" id="imagem">
                                        <input type="file" name="fotografia"  class="custom-file-input" id="escolherFotografia" aria-describedby="inputGroupFileAddon01" onchange="mudarFotografia(event)">
                                        <label class="custom-file-label input_fotografia" for="escolherFotografia"  data-browse="Pesquisar" >{{ __('Escolha uma Fotografia') }}</label>
                                        @error('fotografia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6">
                                        {{-- Nome--}}<br>
                                        <label for="nome" class="col-form-label text-md-right" style="margin-top: 2.9rem">{{ __('Nome Completo') }}</label>
                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="{{ session('nome') }}">
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ session('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        {{-- Contacto--}}
                                        <label for="contacto" class=" col-form-label text-md-right">{{ __('Contacto') }}</label>
                                        <input id="contacto" type="tel" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto" value="{{ old('contacto') }}" placeholder="{{ session('contacto') }}">
                                        @error('contacto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <br><br>
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
                                       mas
                                        {{-- NIF--}}
                                        <label for="nif" class=" col-form-label text-md-right">{{ __('NIF') }}</label>
                                        <input id="nif" type="text" pattern="[0-9]{9}" class="form-control @error('nif') is-invalid @enderror" name="nif" required autocomplete="nif" value="{{ old('nif') }}" placeholder="{{ session('nif') }}">
                                        @error('nif')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mx-auto text-center" >
                                        <button type="submit" class="btn btn-primary btn-registo">
                                            {{ __('Guardar') }}
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

        //Author: Guilherme Jafar
        function mudarFotografia(event) {

                let imagem = document.getElementById("imagem");
                imagem.src = URL.createObjectURL(event.target.files[0]);

        }

    </script>

@endsection
