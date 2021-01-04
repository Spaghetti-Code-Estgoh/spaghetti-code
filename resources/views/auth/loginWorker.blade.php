@extends('layouts.auth_layout')

@section('nav-c')
    <li>
        <h2 class="textCenter">Login Funcionário</h2>
    </li>
@endsection

@section('content')
<div class="container cont-log">
    <div class="row justify-content-center box-log">
        <div class="col-md-10">
            <div class="row" style="justify-content: center; text-align: center">
                <div class="text-header">{{ __('Bem vindo ao SCMed') }}</div>
                <br>
                <br>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror formInput" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Endereço de Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror formInput" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                    <select name="worker" id="worker" class="worker-select">
                                        <option value="0" selected disabled>Indique o tipo de utilizador que é</option>
                                        <option value="1">Médico</option>
                                        <option value="2">Enfermeiro</option>
                                        <option value="3">Funcionario Simples</option>
                                        <option value="4">Adminstrador</option>
                                    </select>
                            </div>

                        </div>

                        <div class="form-group row" style="align-items: center">
                            <div class="col-md-6" style="text-align: left">
                                <div class="form-check">
                                    <label class="form-check-label formLabel" for="remember">
                                        {{ __('Guardar Dados') }}
                                    </label>

                                    <input class="form-check-input checkbox-round" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                </div>
                            </div>

                            <div class="col-md-6" style="text-align: right">
                                @if (Route::has('password.request'))
                                    <a class="linkForm" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu-se da sua password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn submitInput">
                                    {{ __('Entrar') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
