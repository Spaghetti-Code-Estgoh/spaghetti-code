@extends('layouts.auth_layout')

@section('nav')
    <li>
        <a class="btn logNav" href="{{ route('register') }}">{{ __('Registar') }}</a>
    </li>
@endsection

@section('content')
<div class="container cont-log">
    <div class="row justify-content-center box-log">
        <div class="col-md-10">
            <div class="row" style="justify-content: center; text-align: center">
                <div class="text-header mail-header">Esqueceu-se da sua Password?<br>Introduza o seu email para poder muda-lá!</div>
                <br>
                <br>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('resetPasswordEmail') }}">
                        @csrf

                        <div class="form-group row" style="justify-content: center">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror formInput " name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Endereço Email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <br>

                                <select name="worker" id="worker" class="form-control">
                                    <option value="0" selected disabled>Indique o tipo de utilizador que é</option>
                                    <option value="1">Utente</option>
                                    <option value="2">Adminstrador</option>
                                    <option value="3">Médico</option>
                                    <option value="4">Funcionário</option>
                                </select>

                            </div>
                        </div>

                        

                        <div class="form-group row mb-0" style="justify-content: center">
                            <div class="col-md-6">
                                <button type="submit" class="btn submitInput">
                                    {{ __('Send Password Reset Link') }}
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
