@extends('admin/layout')
{{-- //Author: Fabian Nunes--}}
@section('content')
    {{session('flash')}}
    <div class="section-registo" >
        <div class="container" style="height: 100vh;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-registo middle">
                        <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Eliminar Funcionarios') }}</div>

                        <div class="card-body" style="padding-top: 2rem">
                            <form method="POST" action="{{ route('eliminaFuncionario') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <br>
                                    <div class="col-md-6">

                                        {{-- Email--}}
                                        <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                        <br>

                                        <select name="worker" id="worker" class="form-control">
                                            <option value="0" selected disabled>Indique o tipo de utilizador que é</option>
                                            <option value="1">Adminstrador</option>
                                            <option value="2">Médico</option>
                                            <option value="3">Funcionário</option>
                                        </select>

                                        <br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
                                            &nbsp;&nbsp;&nbsp;
                                            <abel class="form-check-label" for="gridCheck" style="color: red">
                                                    Confirmo que tenho certeza da ação que vou realizar
                                            </abel>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mx-auto text-center" >
                                        <button type="submit" class="btn btn-primary btn-registo eliminateBtn">
                                            {{ __('Eliminar') }}
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
