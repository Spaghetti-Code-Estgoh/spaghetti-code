@extends('utentes/layout')
{{-- //Author: Rafael Pais--}}
@section('content')
<div class="section-registo" >
  <div class="container" style="height: 100vh;">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-registo middle">
          <div class="card-body" style="padding-top: 2rem">
           <form method="POST">
             @csrf
             <div class="form-group row">
               <div class="col-md-12">
                 <img class="imagem" src="{{asset('img/imagemtesteDashboard (2).png')}}" alt="Imagem de perfil" id="imagem">
               </div>
                <div class="col-md-6">
                  {{-- Nome--}}<br>
                    <label for="nome" class="col-form-label text-md-right" style="margin-top: 2.9rem">{{ __('Nome Completo') }}</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Maria Santos">
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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="maria.santos@gmail.com">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  {{-- Contacto--}}
                    <label for="contacto" class=" col-form-label text-md-right">{{ __('Contacto') }}</label>
                    <input id="contacto" type="tel" class="form-control @error('contacto') is-invalid @enderror" name="contacto" required autocomplete="contacto" value="{{ old('contacto') }}" placeholder="911 111 111">
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
@endsection
